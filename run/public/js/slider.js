class Image
{
    constructor (id, src, alt )
    {
        this.id = id;
        this.source = src;
        this.alt = alt;
    }
}

class Slider
{
    constructor()
    {
        this.images = [ new Image( "monImage", "public/images/shoes.jpg", "images" ),
                        new Image( "monImage", "public/images/nike.jpg", "images" )
                      ];
        this.i = 0;
    }

    turnRight()
    {
        this.i++;
        if( this.i > this.images.length - 1 )
        {
            this.i = 0;
        }
        let imgElt = document.getElementById( "monImage" );
        imgElt.src = this.images[ this.i ].source;
    }

    turnLeft()
    {
        this.i--;
        if( this.i < 0 )
        {
            this.i = this.images.length - 1;
        }

        let imgElt = document.getElementById( "monImage" );
        imgElt.src = this.images[ this.i ].source;
    }
}

let slide = new Slider();
document.addEventListener( "keyup", ( e ) =>
{
    if( e.keyCode === 37 )
    {
        slide.turnLeft();
    }
    else if( e.keyCode === 39 ) 
    {
        slide.turnRight();
    } 
});

document.getElementById( 'left' ).addEventListener( 'click', () =>
{
    slide.turnLeft();
});

document.getElementById( 'right' ).addEventListener( 'click', () =>
{
    slide.turnRight();
});



