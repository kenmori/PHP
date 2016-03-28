'use strict';

module.exports = function(grunt) {
    var pkg, taskName;
    pkg = grunt.file.readJSON('package.json');
    grunt.initConfig({
        pkg: pkg,
        dir: {
            bin:'./src',//作業フォルダ
            asset:'src/asset/',
            release:'src/asset/sp/m1',//納品ファイル
            css: 'src/css/',
            img:'src/img/',
            sass:'src/scss/',
            coffee:'src/coffee/',
            js:'src/js'
        },
        /*
        * 監視
        */
        watch: {
            sass: {
                files: ['<%= dir.sass %>/*.scss'],
                tasks: ['compass']
            },
            coffee: {
                files: ['<%= dir.coffee %>/*.coffee'],
                tasks: ['coffee']
            },
            html_files:{
                files:'html/*.html'
            },
            options:{
                livereload: true
            }
        },
//ftp設定
        'ftp-deploy': {
          build: {
            auth: {
              host: 'ftp.80452ec58b45dc2b.lolipop.jp',
              // port: ポト番号を記述,
              authKey: 'html/*.html'
            },
            src: './html/',
            dest: 'ftp://ftp.80452ec58b45dc2b.lolipop.jp/study/study/html/',
            exclusions: ['']
          }
        },
        coffee: {
          compile: {
            files: {
             '<%= dir.js %>/fafa.js': ['<%= dir.coffee %>/*.coffee']
              }
            }
        },
        /*
        * conpassの設定
        */
        compass: {
            dist: {
                options: {
                    config: 'config.rb'
                }
            }
        },
        /*
        * cssの圧縮
        */
        cssmin: {
            combine: {
                files: {
                    '<%= dir.release %><%= dir.css %>tokuten.css': ['css/tokuten.css']
                }
            }
        },
        // ファイルをコピーする
        copy: {
            img: {
                expand: true,
                cwd: '<%= dir.bin %>/',
                src: ['img/**'],
                dest: '<%= dir.release %>/'
            }
        },
        /*
        * 画像圧縮
        */
        pngmin: {
            scripts: {
                options: {
                    ext: '.png',
                    quality: '80-90',
                    //colors: 128,
                    //concurrency: 8,
                    force: true,
                },
                files: [{
                    expand: true,
                    src: ['**/*.png'],
                    cwd: '<%= dir.release %><%= dir.img %>',
                    dest: '<%= dir.release %><%= dir.img %>',
                }]
            }
        },
        /*
        * 不要ファイル削除
        */
        clean: {
            // assetフォルダを削除する
            releaseDir: {
                src: '<%= dir.asset %>'
            }
        },
        /*
        * 納品用zip作成
        */
        compress: {
            main: {
                expand: true,
                options: {
                  archive: 'asset.zip'
                },
                cwd: '<%= dir.asset %>',
                src: ['**/*'],
                dest: '<%= dir.asset %>'
            }
        },
        /*
        * サーバー
        */
        connect: {
            server: {
                options: {
                    port: 9000,
                    base: '<%= dir.root %>'
                }
            }
        }
    });


    // pakage.jsonに記載されているパッケージを自動読み込み
    for(taskName in pkg.devDependencies) {
        if(taskName.substring(0, 6) == 'grunt-') {
            grunt.loadNpmTasks(taskName);
        }
    }

    // sassをコンパイルするgruntコマンド
    grunt.registerTask('default', ['connect','watch']);
    // cdnアップ用
    grunt.registerTask('release', ['clean:releaseDir','cssmin','copy:img','pngmin','compress','coffee']);

    grunt.registerTask('eatwarnings', function() {
        grunt.warn = grunt.fail.warn = function(warning) {
            grunt.log.error(warning);
        };
    });
};
