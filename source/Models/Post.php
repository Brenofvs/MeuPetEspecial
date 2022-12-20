<?php

namespace Source\Models;

use Source\Core\Model;

/**
 *
 * @author Brenofvs <brenofvs.consultoria@gmail.com>
 * @package Source\Models
 */
class Post extends Model
{
    /** @var array $safe no update or create */
    protected static $safe = ["id", "created_at", "updated_at"];

    /** @var string $entity database table */
    protected static $entity = "posts";

    /** @var array $required table fileds */
    protected static $required = ["title", "body", "image"];

    /**
     * @param string $title
     * @param string $body
     * @param string $image
     * @return Post
     */
    public function bootstrap(
        string $title,
        string $body,
        string $image,
    ): Post {
        $this->title = $title;
        $this->body = $body;
        $this->image = $image;
        return $this;
    }

    /**
     * @param string $query
     * @param string $params
     * @param string $columns
     * @return array|null
     */
    public function queryBuild(string $query, string $params = "", string $columns = "*"): ?array
    {
        $qb = $this->read("SELECT {$columns} FROM " . self::$entity . " {$query}", $params);
        if ($this->fail() || !$qb->rowCount()) {
            return null;
        }
        return $qb->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @param string $terms
     * @param string $params
     * @param string $columns
     * @return null|Post
     */
    public function find(string $terms, string $params, string $columns = "*"): ?Post
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE {$terms}", $params);
        if ($this->fail() || !$find->rowCount()) {
            return null;
        }
        return $find->fetchObject(__CLASS__);
    }

    /**
     * @param int $id
     * @param string $columns
     * @return null|Post
     */
    public function findById(int $id, string $columns = "*"): ?Post
    {
        return $this->find("id = :id", "id={$id}", $columns);
    }

    /**
     * @param $email
     * @param string $columns
     * @return null|Post
     */
    public function findByTitle($title, string $columns = "*"): ?Post
    {
        return $this->find("title = :title", "title={$title}", $columns);
    }

    /**
     * @param int $limit
     * @param int $offset
     * @param string $columns
     * @return array|null
     */
    public function all(int $limit = 30, int $offset = 0, string $columns = "*"): ?array
    {
        $all = $this->read(
            "SELECT {$columns} FROM " . self::$entity . " LIMIT :limit OFFSET :offset",
            "limit={$limit}&offset={$offset}"
        );

        if ($this->fail() || !$all->rowCount()) {
            return null;
        }
        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @return null|Post
     */
    public function save(): ?Post
    {
        if (!$this->required()) {
            $this->message->warning("Você precisa preencher todos os campos!");
            return null;
        }

        /** User Update */
        if (!empty($this->id)) {
            $postId = $this->id;

            if ($this->find("title = :t AND id != :i", "t={$this->title}&i={$postId}")) {
                $this->message->warning("Uma postagem com este título já está cadastrada");
                return null;
            }

            $this->update(self::$entity, $this->safe(), "id = :id", "id={$postId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return null;
            }
        }

        /** Post Create */
        if (empty($this->id)) {
            if ($this->findByTitle($this->title)) {
                $this->message->warning("Uma postagem com este título já está cadastrada!");
                return null;
            }

            $postId = $this->create(self::$entity, $this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return null;
            }
        }

        $this->data = ($this->findById($postId))->data();
        return $this;
    }

    /**
     * @return null|Post
     */
    public function destroy(): ?Post
    {
        if (!empty($this->id)) {
            $this->delete(self::$entity, "id = :id", "id={$this->id}");
        }

        if ($this->fail()) {
            $this->message->error("Não foi possível remover o usuário");
            return null;
        }

        $this->data = null;
        return $this;
    }
}
