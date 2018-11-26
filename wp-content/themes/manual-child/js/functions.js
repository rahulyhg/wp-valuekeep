<script>
	function goToByScroll(id){
            var margem = 200;
            $('html,body').animate({
                scrollTop: $("#"+id).offset().top - margem},
                'slow');
        }
        
        function goToByScrollbyClass(classe){
            var margem = 200;
            $('html,body').animate({
                scrollTop: $("."+classe).offset().top - margem},
                'slow');
        }
        
		function myFunction() {
			$( "#myDropdown" ).addClass( "show" );
		}
        
        function createCookie(name,value,days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime()+(days*24*60*60*1000));
                var expires = "; expires="+date.toGMTString();
            }
            else var expires = "";
            document.cookie = name+"="+value+expires+"; path=/";
        }

        function readCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        }

        function eraseCookie(name) {
            createCookie(name,"",-1);
        }

		
		window.onclick = function(event) {
		  if (!event.target.matches('.dropbtn')) {

			var dropdowns = document.getElementsByClassName("dropdown-content");
			var i;
			for (i = 0; i < dropdowns.length; i++) {
			  var openDropdown = dropdowns[i];
			  if (openDropdown.classList.contains('show')) {
				openDropdown.classList.remove('show');
			  }
			}
		  }
		}
	</script>
    <script>
        $(document).ready(function(){
                $(".custom-nav-logo").click(function() {
                    eraseCookie('area');
                    eraseCookie('perfil');
                    })
        });
    </script>
    <script>
    $(document).ready(function(){
    if (readCookie("area") == 'profiles') {
        $("#menu-item-550").addClass("browsedarea");
        $("#menu-item-550").find( "a" ).css({"color": "#48beac!important"} );
        $("#menu-item-1367").addClass("browsedarea");
        $("#menu-item-1367").find( "a" ).css({"color": "#48beac!important"} );
        $("#profilescor").addClass("cor");
        $("#menu-item-566").addClass("browsedarea");
        $("#menu-item-566").find( "a" ).css( {"color": "#48beac!important"} );
        }
    else if (readCookie("area") == 'modules') {
        $("#menu-item-551").addClass("browsedarea");
        $("#menu-item-551").find( "a" ).css( {"color": "#48beac!important"} );
        $("#menu-item-1366").addClass("browsedarea");
        $("#menu-item-1366").find( "a" ).css({"color": "#48beac!important"} );
        $("#modulescor").addClass("cor");
        $("#menu-item-567").addClass("browsedarea");
        $("#menu-item-567").find( "a" ).css( {"color": "#48beac!important"} );
        }
    
    else {
                eraseCookie('area');
                eraseCookie('perfil');
            }
    });
    </script>
    
	<script>
        $(document).ready(function(){
            goToByScrollbyClass("kb-single");
        });
    </script>
    
    <script>
        $(document).ready(function(){
            goToByScroll("docs");
        });
    </script>

    <script>
     $(document).ready(function(){
                $("#menu-item-551").click(function() {
                    createCookie('area','modules',1)
                    eraseCookie('perfil');
                    })
        });
    </script>
    <script>
     $(document).ready(function(){
                $("#menu-item-550").click(function() {
                    createCookie('area','profiles',1);
                    })
        });
    </script>
    <script>
     $(document).ready(function(){
                $("#menu-item-566").click(function() {
                    createCookie('area','profiles',1);
                    })
        });
    </script>
    <script>
     $(document).ready(function(){
                $("#menu-item-567").click(function() {
                    createCookie('area','modules',1);
                    eraseCookie('perfil');
                    })
        });
    </script>
    <script>
     $(document).ready(function(){
                $("#menu-item-1367").click(function() {
                    createCookie('area','profiles',1);
                    })
        });
    </script>
    <script>
     $(document).ready(function(){
                $("#menu-item-1366").click(function() {
                    createCookie('area','modules',1)
                    eraseCookie('perfil');
                    })
        });
    </script>
    <script>
     $(document).ready(function(){
                $(".bloco-kb").click(function() {
                    createCookie('area','modules',1);
                    eraseCookie('perfil');
                    })
        });
    </script>
    
    <script>
     $(document).ready(function(){
                $(".adminclick").click(function() {
                    //document.cookie = "perfil=Administrator";
                    createCookie('perfil','Administrator',1);
                    createCookie('area','profiles',1);
                    
                    })
        });
    </script>
    <script>
     $(document).ready(function(){
                $(".subscriberclick").click(function() {
                    //document.cookie = "perfil=Subscriber;";
                    createCookie('area','profiles',1);
                    createCookie('perfil','Subscriber',1);
                    })
        });
    </script>
    <script>
     $(document).ready(function(){
                $(".managerclick").click(function() {
                    //document.cookie = "perfil=Manager;";
                    createCookie('area','profiles',1);
                    createCookie('perfil','Manager',1);
                    })
        });
    </script>
    <script>
     $(document).ready(function(){
                $(".techclick").click(function() {
                    //document.cookie = "perfil=Technician;";
                    createCookie('area','profiles',1);
                    createCookie('perfil','Technician',1);
                    })
        });
    </script>
    <script>
     $(document).ready(function(){
                $(".requesterclick").click(function() {
                    //document.cookie = "perfil=Requester;";
                    createCookie('area','profiles',1);
                    createCookie('perfil','Requester',1);
                    })
        });
    </script>
    <script>
     $(document).ready(function(){
                $(".partnerclick").click(function() {
                    //document.cookie = "perfil=Partner;";
                    createCookie('area','profiles',1);
                    createCookie('perfil','Developer',1);
                    })
        });
    </script>