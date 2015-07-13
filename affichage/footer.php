<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script>
    $('.button-collapse').sideNav({
        menuWidth: 300, // Default is 240
        edge: 'left', // Choose the horizontal origin
        closeOnClick: false // Closes side-nav on <a> clicks, useful for Angular/Meteor
    });

    $('#search').keyup(function(){
        if($(this).val()){
            $('.menu-search').css("display","none");
        }
        else{

        }
    });

    $("*").click(function(){
        if(!$('#search').val()){
            $('.menu-search').css("display","block");
        }
    });

    $('#search-mobile').keyup(function(){
        if($(this).val()){
            $('.menu-search-mobile').css("display","none");
        }
        else{

        }
    });

    $("*").click(function(){
        if(!$('#search-mobile').val()){
            $('.menu-search-mobile').css("display","block");
        }
    });

    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
    });
</script>
</body>
</html>
