var app = app || {};
app.ErrorView = Backbone.View.extend({
    id: 'errorDisplay',
    template: Handlebars.compile($('#errorAlert-template').html()),
    initialize: function(message) {
        this.message = message;
        this.render();
    },
    render: function() {
        this.$el.html(this.template({
            'message': this.message
        }));
        $('#right_bottom').html(this.$el.html());
    }
});
