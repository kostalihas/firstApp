/**
 * Created by D E L L on 14/07/15.
 */

    // options
    message: 'Bienvenue Dans la page d\'acceuil'
},{
    // settings
    type: 'info',
    delay: 5000,
    timer: 500
});
//this part is used for setting the notification to zero when clicked on it
$('.notification').click(function(){
    var url_app = $(this).data().url;
    
    
    console.log(url_app);
    $.ajax({
       url: url_app, //i have to change this line to be dynamically calculated
                     // in case if the application been put into producation
       dataType: 'json',
       success: function(data){
                console.log(data);
              },
       error: function(e){
                console.log('erreur dans l\'application ou connexion inexistante');
             }
    });

});