'use strict';

var $ = require('jquery');
var paginate = require('jquery-pagination');
var FontFaceObserver = require('fontfaceobserver');

// add the section number to the top of each section
$('#story .js-storySection').each(function(i, el) {
  $(el)
    .append('<div class="sectionNum">part ' + (i + 1) + '</div>')
    .attr('id', 'section' + (i + 1));
});

// prevent FOIT/FOUT
// var observer = new FontFaceObserver('Roboto Condensed', {});

// observer.check(null, 5000).then(function() {
//   $('body').addClass('fonts-loaded');
// });