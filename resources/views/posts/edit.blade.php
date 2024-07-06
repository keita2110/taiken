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
            <input type="text" name="post[title]" placeholder="タイトル" value={{$post->title}} />
            <!--requestで送信したキー名をoldの後ろに入力//-->
            <p class="title_error" style="color:red">{{$errors->first('post.title')}}</p>
            <!--firstの後ろはバリテーションで送信したキー-->
        </div>
        
        <div class="body">
            <h2>Body</h2>
            <input type='text' name='post[body]' value='{{$post->body}}'> 
            <p class='body_error' style="color:red">{{$errors->first('post.body')}}</p>
        </div> 
        
        </div>
        
        <div class="category">
            <h2>Category</h2>
            <select name="post[category_id]">
                <!--select要素のname属性はフォームの送信時に送信されるデータの名前を示す
                　  post[category_id]=$category->idというように送信される
                -->
                @foreach($categories as $category)
                    <option value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                    <!--選択した$category->nameの$category->idが実際にフォームに送信されていることを示す
                    -->
                @endforeach
            </select>
        </div>
        
        <div class="store">
            <input type="submit" value="保存" />
        </div>
        </form>
        <div class="footer">
            <a href="/posts/{{$post->id}}">戻る</a>
        </div>
        
    </body>
</html>
