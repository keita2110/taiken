<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       
        <title>Blog</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

       
    </head>
    <body >
        <h1>Blog Name</h1>
        
        <form action="/posts" method="POST">
        @csrf
        <div class="title">
            <h2>Title</h2>
            <input type="text" name="post[title]" placeholder="タイトル" />
        </div>
        
        <div class="body">
            <h2>Body</h2>
            <textarea name="post[body]" placeholder="今日も頑張りましょう"></textarea>
        </div> 
        
        <div class="store">
            <input type="submit" value="保存" />
        </div>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        
    </body>
</html>
