$(function() {
  $(window).load(function() {
    new App('http://cbuehler.li/wp-admin/admin-ajax.php');
  })
});

var App = function(ajaxUrl) {
  this.ajaxUrl = ajaxUrl;
  this.init();
  this.navigate(location.hash);
  this.postTemplate = '\
    <section data-name=":name">\
      <div class="wrapper">\
        <h1>:title</h1>\
        :content\
      </div>\
    </section>';
  this.comingFromProfile = false;
};

App.prototype = {
  init: function() {
    var _this = this;

    $(window).on('hashchange', function() {
      _this.navigate(location.hash);
    });
  },
  navigate: function(nav) {
    var postName, _this = this;

    // remove hash
    nav = nav.slice(1);

    // set default route
    if (nav == '') nav = 'profile';

    $('.nav-link').removeClass('active');

    // show profile
    if (nav == 'profile') {

      // hide footer and project nav
      $('.project-footer, #project-nav').fadeOut();

      this.comingFromProfile = true;

      // show logo
      $('#logo')[0].dispatchEvent(new Event('show'));
      $('#logo-font').addClass('visible');

      $('body').removeClass('dark');
      $('#profile-link').addClass('active');
      return;
    }

    // hide all the single projects
    $('#sections > section').removeClass('visible');

    if (this.comingFromProfile) {

      // remove all the single projects
      $('#sections > section').removeClass('block');
    }

    this.comingFromProfile = false;

    postName = nav.split('/')[1];
    if (!postName) postName = $('#project-nav > li > a').eq(0).data('post-name');

    // hide logo
    $('#logo')[0].dispatchEvent(new Event('hide'));
    $('#logo-font').removeClass('visible');

    // show projects
    $('body').addClass('dark');
    $('#projects-link').addClass('active');

    // update nav
    $('#project-nav > li > a').removeClass('active');
    $('#project-nav > li > a[data-post-name="' + postName + '"]').addClass('active');

    setTimeout(function() {

      // remove all the single projects
      $('#sections > section').removeClass('block');

      // show this project
      _this.showProject(postName, function() {

        // show footer and project nav
        $('.project-footer, #project-nav').fadeIn();

        // load the next project
        // _this.loadProject(nav + 1, function() {
        //
        // });
      });
    }, 400);
  },
  showProject: function(name, success) {
    var _this = this, p;

    // the project was not yet loaded
    if (!this.getProject(name)) {

      // laod the project
      this.loadProject(name, function() {

        // show the project
        _this.showProject(name, success);
      });
      return;
    }

    p = this.getProject(name);
    p.addClass('block');
    setTimeout(function() {
      p.addClass('visible');
    }, 100);

    success();
  },
  getProject: function(name) {
    var p = $('#sections > section[data-name=' + name + ']');
    return p.length > 0 ? p : false;
  },
  loadProject: function(name, success) {
    var _this = this;

    // this project was already loaded
    if (this.getProject(name)) return success();

    $.get(this.ajaxUrl + '?action=get_post_action&name=' + name, function(data) {
      data = JSON.parse(data);

      // this project was already loaded
      if (_this.getProject(data.offset)) return success();

      $('#sections').prepend(_this.postTemplate
        .replace(':title', data.title)
        .replace(':name', data.name)
        .replace(':content', data.content));

      success(data.offset, data.post_title);
    });
  }
}
