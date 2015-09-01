var app = app || {};

app.DbViewListShow = Backbone.View.extend({
    el: '#viewslist_container',
    id: 'viewlist',
    template: Handlebars.compile($('#viewlist-template').html()),
    initialize: function () {
        this.collection = new app.DbViewList();
        this.collection.fetch({reset: true});
        this.render();
        this.listenTo(this.collection, 'reset', this.render)

    },
    render: function() {
        this.$el.html(this.template({views: this.collection.toJSON()}));
    }

})
