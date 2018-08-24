<html>
<head>
<style>
    #users
    {
      position: absolute;
      max-height: 250px;
      border: 1px solid #888686;
      width: 100%;
      z-index: 1000;
      background-color: #fff;
      overflow-y: auto;
    }
    #users ul
    {
      padding-left: 0px;
      margin-bottom: 0px;
    }
    #users  ul li
    {
      list-style: none;
      line-height: 30px;
      padding-left: 25px;

    }
    #users ul li:hover
    {
      background-color: #8e24aa;
      color:#fff;
      cursor: pointer;
    }
    #sblock
    {
      width: 300px;
    }
    </style>
</head>
<body>
    <div id="sblock">
          <input type="text" id="search_key">
          <div id="users"></div>
    </div>
    <div id="search_data">

    </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous "></script>
<script type="text/javascript">
 $(document).ready(function(){

      $('#search_key').on('keyup', function(){
        $('#users').html('');
        var key = $('#search_key').val();
        if(key  != '')
        {
          $.ajax({
            url:'http://localhost/gsearch/bappoint/search', //controllers url
            type:'post',
            data:{'search_key':key},
            success:function(json)
            {
              if(json.length >  0)
              {
                search_data =  '<ul>';
                $.each(json, function(key, val){
                  search_data += `<li value='${val.id}'>${val.fname}</li>`;
                });
                search_data += `</ul>`;
                $('#users').html(search_data);
              }
            }
          });
        }

      });

      $('#users').on('click', 'li', function(){
        user_id = $(this).val();
        if(user_id  != '')
        {
          $.ajax({
            url:'http://localhost/gsearch/bappoint/get_data', //controllers url
            type:'post',
            data:{'user_id':user_id},
            success:function(json)
            {
              $('#search_data').html(json[0].about);
              $('#users').html('');
              //console.log(json[0].about);
            }});
        }
        else {
          $('#search_data').html('');
        }

      });

    });
</script>
</body>
</html>
