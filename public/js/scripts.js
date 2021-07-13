$('.likes').click(
        function() {
            if($(this).hasClass('liked'))
            {
              $(this).removeClass('liked');
              $(this).addClass('like');
             }
             else{
              $(this).removeClass('like');
              $(this).addClass('liked');
             }
             });

       $('.dislikes').click(
        function() {
            if($(this).hasClass('disliked'))
            {
              $(this).removeClass('disliked');
              $(this).addClass('dislike');
             }
             else{
              $(this).removeClass('dislike');
              $(this).addClass('disliked');
             }
             });

       $('.mini.content button').click(
        function() {
           $('.mini.content').hide();
             });

        $('.plustrack').click(
        function() {
           $('.mini.content').show();
             });

            
            
            
            
             $('.like').click(
              function() {
                  let user_id = $(this).attr('data-id-user');
                  let track_id = $(this).attr('data-id-track');
                  console.log(user_id);
                  $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/addlike',
                    cashe: false,
                    data: {
                        'user_id': user_id, 'track_id': track_id, 
                    },
                    proccessData: false,
                    dataType: 'html',
                    success: function (data) {
                        //window.location.replace(data);
                    },
                    error: function () {
                        alert('К сожалению, возникли ошибки');
                    }
                });
              });
              $('.liked').click(
                function() {
                    let user_id = $(this).attr('data-id-user');
                    let track_id = $(this).attr('data-id-track');
                    console.log(user_id);
                    $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  $.ajax({
                      type: 'POST',
                      url: '/deletelike',
                      cashe: false,
                      data: {
                          'user_id': user_id, 'track_id': track_id, 
                      },
                      proccessData: false,
                      dataType: 'html',
                      success: function (data) {
                          //window.location.replace(data);
                      },
                      error: function () {
                          alert('К сожалению, возникли ошибки');
                      }
                  });
                });
                $('.dislike').click(
                  function() {
                      let user_id = $(this).attr('data-id-user');
                      let track_id = $(this).attr('data-id-track');
                      console.log(user_id);
                      $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: '/adddislike',
                        cashe: false,
                        data: {
                            'user_id': user_id, 'track_id': track_id, 
                        },
                        proccessData: false,
                        dataType: 'html',
                        success: function (data) {
                            //window.location.replace(data);
                        },
                        error: function () {
                            alert('К сожалению, возникли ошибки');
                        }
                    });
                  });
                  $('.disliked').click(
                    function() {
                        let user_id = $(this).attr('data-id-user');
                        let track_id = $(this).attr('data-id-track');
                        console.log(user_id);
                        $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      });
                      $.ajax({
                          type: 'POST',
                          url: '/deletedislike',
                          cashe: false,
                          data: {
                              'user_id': user_id, 'track_id': track_id, 
                          },
                          proccessData: false,
                          dataType: 'html',
                          success: function (data) {
                              //window.location.replace(data);
                          },
                          error: function () {
                              alert('К сожалению, возникли ошибки');
                          }
                      });
                    });
                    $('.delete').click(
                        function() {
                            let track_id = $(this).attr('data-id-track');
           
                            $.ajaxSetup({
                              headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                          });
                          $.ajax({
                              type: 'POST',
                              url: '/deletetrack',
                              cashe: false,
                              data: {
                                  'track_id': track_id, 
                              },
                              proccessData: false,
                              dataType: 'html',
                              success: function (data) {
                                  window.location.replace(data);
                              },
                              error: function () {
                                  alert('К сожалению, возникли ошибки');
                              }
                          });
                        });
                        $('.deletec').click(
                            function() {
                                let comment_id = $(this).attr('data-id');
                                console.log(comment_id);
                                $.ajaxSetup({
                                  headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  }
                              });
                              $.ajax({
                                  type: 'POST',
                                  url: '/deletec',
                                  cashe: false,
                                  data: {
                                      'comment_id': comment_id, 
                                  },
                                  proccessData: false,
                                  dataType: 'html',
                                  success: function (data) {
                                      window.location.replace(data);
                                  },
                                  error: function () {
                                      alert('К сожалению, возникли ошибки');
                                  }
                              });
                            });
                    $('.comments').click(
                        function() {
                          let id = $(this).attr('data-id-track');
                          if($('.block-comments#'+id).is(':hidden'))
                           $('.block-comments#'+id).show();
                         else $('.block-comments#'+id).hide();
                             });