var slice = [].slice;

(function($, window) {
  var Star;
  window.Star = Star = (function() {
    Star.prototype.defaults = {
      rating: void 0,
      max: 5,
      readOnly: false,
      emptyClass: 'mdi-star-outline',
      fullClass: 'mdi-star',
      change: function(e, value) {}
    };

    function Star($el, options) {
      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      this.createStars();
      this.syncRating();
      if (this.options.readOnly) {
        return;
      }
      this.$el.on('mouseover.star', 'i', (function(_this) {
        return function(e) {
          return _this.syncRating(_this.getStars().index(e.currentTarget) + 1);
        };
      })(this));
      this.$el.on('mouseout.star', (function(_this) {
        return function() {
          return _this.syncRating();
        };
      })(this));
      this.$el.on('click.star', 'i', (function(_this) {
        return function(e) {
          e.preventDefault();
          return _this.setRating(_this.getStars().index(e.currentTarget) + 1);
        };
      })(this));
      this.$el.on('star:change', this.options.change);
    }

    Star.prototype.getStars = function() {
      return this.$el.find('i');
    };

    Star.prototype.createStars = function() {
      var j, ref, results;
      results = [];
      for (j = 1, ref = this.options.max; 1 <= ref ? j <= ref : j >= ref; 1 <= ref ? j++ : j--) {
        results.push(this.$el.append('<i class="material-icons">'));
      }
      return results;
    };

    Star.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('star:change', rating);
    };

    Star.prototype.getRating = function() {
      return this.options.rating;
    };

    Star.prototype.syncRating = function(rating) {
      var $stars, i, j, ref, results;
      rating || (rating = this.options.rating);
      $stars = this.getStars();
      results = [];
      for (i = j = 1, ref = this.options.max; 1 <= ref ? j <= ref : j >= ref; i = 1 <= ref ? ++j : --j) {
        results.push($stars.eq(i - 1).removeClass(rating >= i ? this.options.emptyClass : this.options.fullClass).addClass(rating >= i ? this.options.fullClass : this.options.emptyClass));
      }
      return results;
    };

    return Star;

  })();
  return $.fn.extend({
    star: function() {
      var args, option;
      option = arguments[0], args = 2 <= arguments.length ? slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;
        data = $(this).data('star');
        if (!data) {
          $(this).data('star', (data = new Star($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);