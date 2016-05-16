window.addEventListener('load', gogogo, false);
		
		var total = 0;
		var votos = 0;
		var media = 0;
		
		var star0 = "<img src='images/votar/0.png' alt='0'/>";
		var star05 = "<img src='images/votar/05.png' alt='05'/>";
		var star1 = "<img src='images/votar/1.png' alt='1'/>";
		
		function gogogo(){		
			for(i=1; i<=5; i++){
				document.getElementById(i).addEventListener("mouseover", starOver, false);
			}			
			for(i=1; i<=5; i++){
				document.getElementById(i).addEventListener("mouseout", starOut, false);
			}
			
			for(i=1; i<=5; i++){
				document.getElementById(i).addEventListener("click", starClick, false);
			}
		}
		
		function starOver(){
			for(i=1; i<=this.id; i++){
				document.getElementById(i).src = "images/votar/1.png";
			}
		}
		
		function starOut(){
			for(i=1; i<=this.id; i++){
				document.getElementById(i).src = "images/votar/0.png";
			}
		}

		function starClick(){
			votos++;			
			total = total + parseInt(this.id);			
			media = Math.round(parseFloat(total/votos)*2)/2;		
			//mostrar(media);					
			document.getElementById("valoracion").innerHTML = media + "/10 - Votos: "+votos;
		}
		
		/*function mostrar(media) {
			var r = "";
			var c = 0;
			
			while(media > 0){
				if(media >= 1){
					r = r + star1;
					media = media - 1;
					c = c+1;
				}				
				else if (media < 1 && media >= 0){
					r = r + star05;
					media = media - 0.5;
					c=c+1;
				}
			}
			for(i=5; i>c; i--){
				r = r + star0;
			}
		
			document.getElementById("rating").innerHTML = r;
		}*/