var base_url = 'http://localhost/cw/';
    $(document).ready(function(){
          $('#menu').on('change', function(event) {
           //debugger;
            event.preventDefault();
            var menu= $("#menu").val(); 
            $.ajax({
                url: base_url+'admin-select_sub_menu',
                method: 'POST',
                data: {menu:menu},  
                success: function(data) {
                    $('#sub_menu_id').html(data);
                    console.log(data);                   
                }
            });

        });
      });