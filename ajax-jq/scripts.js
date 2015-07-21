/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var Actors = {
    init : function(config){
        this.config = config;
        this.bindEvents();
    },
    bindEvents: function(){
        this.config.letterSelection.on('change', this.fetchActors);
    },
    fetchActors: function(){
        var self = Actors;
        console.log(self.config.form.serialize()); return;
        $.ajax({
            url : 'index.php',
            type : 'POST',
           data : self.config.form.serialize(),
           success : function(results){
               console.log(results)
           }
        });
    }
};

Actors.init({
    letterSelection : $('#q'),
    form : $('form#actor-form')
});
