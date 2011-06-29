(function($) {
  $.fn.spotlight = function(options) {
    if (this.length && (spotlight = $.data(this[0], 'spotlight'))) {
      return spotlight;
    }

    return this.each(function() {
      $.data(this, 'spotlight', new $.spotlight.init(this, options));
    });
  };

  $.spotlight = {
    defaults: {
      featureItems  : '.spotlight_item',
      itemContent   : '.featured_content',
      feature       : '.spotlight_feature',    
      featuredClass : 'on',
      displayTime   : 3,
      autoReStart   : true,
      transition    : null
    },

    init: function(element, settings) {
      var self = this;

      this.settings = $.extend({}, $.spotlight.defaults, settings);

      this.features = $(element).find(this.settings.featureItems);
      this.featureContainer = $(element).find(this.settings.feature);

      if (this.settings.transition) {
        if (typeof this.settings.transition == 'object') {
          this.settings.transitionSpeed = this.settings.transition[1];
          this.settings.transition = this.settings.transition[0];
        }

        this.transitionContainer = this.featureContainer.clone()
          .css({
            position: 'absolute',
            top: 0, left: 0,
            margin: 0, border: 0,
            overflow: 'hidden'
          })
          .hide();
      }

      this.features
        .each(function(idx) {
          var featured = $(this);
          featured.data('idx', idx);
          featured.data('featured', featured.find(self.settings.itemContent).remove().html());
        })
        .hover(
          function() { self.show($(this).data('idx')); },
          function() { self.restart(); }
        );

      this.featureContainer
        .hover(
          function() { self.stop(); },
          function() { self.restart(); }
        );

      this.show(0);
      this.start();
    }
  };

  $.extend($.spotlight.init.prototype, {
    currentIdx  : 0,
    showing     : null,
    running     : false,
    interval    : null,

    show: function(idx) {
      this.stop();

      if (this.showing)
        this.showing.removeClass(this.settings.featuredClass);

      this.showing = this.features.eq(idx);
      this.currentIdx = idx;
      this.showing.addClass(this.settings.featuredClass);

      if (this.featureContainer) {
        if (this.transitionContainer)
          this.transitionTo(this.showing.data('featured'));
        else
          this.featureContainer.html(this.showing.data('featured'));
      }
    },

    start: function() {
      var self = this;
      this.running = true;
      this.interval = setTimeout(function() { self.next(true); }, this.settings.displayTime * 1000);
    },

    stop: function() {
      this.running = false;
      clearTimeout(this.interval);
    },

    restart: function() {
      if (this.settings.autoReStart)
        this.start();
    },

    next: function(override) {
      if (this.running || override) {
        var idx = this.currentIdx + 1;
        if (idx >= this.features.size())
          idx = 0;

        this.show(idx);

        if (this.running || override)
          this.start();
      }
    },

    transitionTo: function(html) {
      var self = this;
      this.transitionContainer
        .hide()
        .html(html)
        .appendTo(this.featureContainer);

      this.transitionContainer[this.settings.transition](this.settings.transitionSpeed, function() {
        self.featureContainer.html(html);
      });
    }
  });
})(jQuery);

 