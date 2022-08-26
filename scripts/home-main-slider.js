const pics = document.querySelectorAll( '.pic-thumb' );

pics.forEach( pic =>
{
    pic.addEventListener( 'click', function handleClick ( event )
    {
        var src = this.src;
        document.getElementById( "main-banner" ).src = src;
    } );
} );