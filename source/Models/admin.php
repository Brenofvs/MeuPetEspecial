<?php

namespace Source\Models;

use Source\Core\Model;
use Source\Core\Session;
use Source\Support\Message;

/**
 *
 * @author Brenofvs <brenofvs.consultoria@gmail.com>
 * @package Source\Models
 */
class Admin extends Model
{
    /** @var array $safe no update or create */
    protected static $safe = ["id"];

    /** @var string $entity database table */
    protected static $entity = "admin";

    /** @var array $required table fileds */
    protected static $required = ["login", "password"];

    /**
     * @param string $login
     * @param string $password
     * @return Admin
     */
    public function bootstrap(
        string $login,
        string $password,
    ): Admin {
        $this->login = $login;
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $terms
     * @param string $params
     * @param string $columns
     * @return null|Admin
     */
    public function find(string $terms, string $params, string $columns = "*"): ?Admin
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE {$terms}", $params);
        if ($this->fail() || !$find->rowCount()) {
            return null;
        }
        return $find->fetchObject(__CLASS__);
    }

    public function login($user, $password)
    {
        $pass = $this->find("login = :u", "u={$user}", "password");
        if ($this->fail() || empty($pass) || \is_null($pass)) {
            return null;
        }

        $passValue = (array) $pass->data;
        if (is_null($passValue)) {
            return null;
        } else {
            $passVerify = passwd_verify($password, $passValue['password']);
        }

        if ($passVerify) {
            $userSession = new Session;
            $userSession->set("user", $user);
            header("Location: https://www.localhost/MeuPetEspecial/admin/");
        }
        return $this;
    }
}
