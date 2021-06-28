const { default: axios } = require('axios');

require('./bootstrap');
require('alpinejs');
window.Swal = require('sweetalert2');

    
$(document).ready(function(){
        $('.toggle-btn').click(function(){
            $('#sidebar').toggleClass('active');
            
        });  

        $('.hidetweet').click(function(){
            axios.post($(this).data('href')).then(function(response){
              console.log(response);
              swal({
                icon: 'success',
                title:'tweet oculto',
                text:"sea ocultado con exito",
                type:'success'
            }).then((value) => {
            location.reload();
            }).catch(swal.noop);

          });
        });
});


