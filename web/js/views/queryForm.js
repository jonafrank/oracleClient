var app = app || {}

app.QueryForm = Backbone.View.extend({
    el: '#queryForm_container',
    template: Handlebars.compile($('#queryForm-template').html()),
    initialize: function() {
        this.render();
    },
    render: function() {
        this.$el.html(this.template());
    }
})
