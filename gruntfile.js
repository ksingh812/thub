'use strict';
module.exports = function(grunt) {
  require('jit-grunt')(grunt);

  grunt.initConfig({
    less: {
      development: {
        options: {
          compress: true,
          yuicompress: true,
          optimization: 2
        },
        files: {
          "themes/tkthub-child/css/main.css": "themes/tkthub-child/less/main.less" // destination file and source file
        }
      }
    },
    cssmin: {
	  minify: {
	    src: 'themes/tkthub-child/style.css',
	    dest: 'themes/tkthub-child/style.min.css'
	  }
	},
    watch: {
      styles: {
        files: ['less/**/*.less'], // which files to watch
        tasks: ['less'],
        options: {
          nospawn: true
        }
      }
    }
  });

  grunt.registerTask('default', ['less', 'watch']);
  grunt.registerTask('test', ['cssmin']);
};