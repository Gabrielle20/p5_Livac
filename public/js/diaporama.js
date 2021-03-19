new Diaporama("diaporama",document.querySelector("#diaporama"), [""], 5000);


class Diaporama {
// extends Composant{

    /**
     * construtor
     * @constructor
     * @param {string}      name       le nom du composant
     * @param {HTMLElement} domTarget  l'endroit où injecter le composant
     * @param {Array}       images     la liste des images
     */
    constructor(name, domTarget, images, timeout){
      super(name, domTarget, "diaporama");
      
      console.log(this);
      
      this.currentSlideId = -1;
      this.images         = images;
      this.timeout        = timeout;
      this.playing        = true;
      
      this.slide       = new Slide("imageSlide", this.DOM);
      this.prevtBt     = new SlideButton("Prev", this.DOM, "prev", this.prevSlide.bind(this));
      this.playPauseBt = new SlideButton("Play/Pause", this.DOM, "pause", this.playPause.bind(this));
      this.nextBt      = new SlideButton("Next", this.DOM, "next", this.nextSlide.bind(this));
      
      this.restart();
      this.nextSlide();
      
      //Touches du clavier
      window.addEventListener('keyup', (e) => {
        switch (e.key) {
          case 'ArrowLeft': 
            this.prevSlide();
            break;
  
          case 'ArrowRight':
            this.nextSlide();
            break;
        }
      });
    }
  
    nextSlide(){
      this.restart();
      this.currentSlideId++;
      if (this.currentSlideId >= this.images.length) this.currentSlideId = 0;
      console.log("numero slide",this.currentSlideId);
      this.slide.update(this.images[this.currentSlideId]);
    }
  
    prevSlide(){
      this.restart();
      this.currentSlideId--;
      if (this.currentSlideId < 0 ) this.currentSlideId = this.images.length-1;
      console.log(this.currentSlideId);
      this.slide.update(this.images[this.currentSlideId]);
    }
  
    playPause(){
      this.playing = !this.playing;
      console.log(this.playing);
      if(!this.playing){
        clearInterval(this.tempo);
        this.playPauseBt.update("play");
      }
      else {
        this.restart();
        this.playPauseBt.update("pause");
      }
    }
  
    restart(){
      clearInterval(this.tempo);
      this.tempo = setInterval(this.nextSlide.bind(this), this.timeout);
    }
  
  
  }