const pics = document.querySelectorAll( '.pic-thumb' );

function handleClick ()
    {
        let src = this.src;
        document.getElementById("main-banner").src = src;
    } 

pics.forEach( pic =>
{
    pic.addEventListener( 'click', handleClick);
} );