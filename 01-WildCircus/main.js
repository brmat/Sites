<script type="text/javascript">

    $(function(){
        $(window).konami({
            run: function(){
                $('#secret').show();
                alert('Hardcore Gamer ;)');
            }
        });
    });
    
    <script type="text/javascript">
	
		$(document).ready(function(){
		
		//.parallax(xPosition, adjuster, inertia, outerHeight) 
		//xPosition - Position horizontale de l'élément (css)
		//adjuster - La position Y de départ
		//inertia - Vitesse en fonction du Scroll. Exemple: 0.1 est 1/10 ème de la vitesse du scroll. 2 = deux fois la vitesse du scroll.
		//outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
			$('#slide1').parallax("center", 0, 0.1, true);
			$('#slide2').parallax("center", 900, 0.1, true);
			$('#slide3').parallax("center", 2900, 0.1, true);
		})

   



}