<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       
        <title>Blog</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

       
    </head>
    <body class="antialiased">
        <h1>Blog Name</h1>
        <a href="/posts/create">create</a>
        <div class='posts'>
            @foreach($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                    </h2>
                    <p class='body'>{{$post->body}}</p>
                    
                    <form action='/posts/{{$post->id}}' id='form_{{$post->id}}' method='POST'>
                        <!--idは投稿ごとに変化させたいので$postのidをformのidに入れ込む形である
                        　　formのidにはform_その投稿が持つid
                        -->
                        @csrf
                        @method('DELETE')
                        <button type='button' onclick='deletePost({{$post->id}})'>delete</button>
                        <!--type=bottonを指定していないと勝手にsubmitしてしまうため
                            今回はJavaScriptからsubmitを送信したいためtypeの設定が必須
                            
                            ｛｛重要｝｝　<button id="btn">引く</button>
                             onclickの中でHTML側からJavaScriptの関数であるDeletePostを呼び出す際にDeletePostの引数として
                             その投稿が持つid　つまり、$postのidを指定する。
                             →→delete関数の引数のところへ移動
                        -->
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <script>
            function deletePost(id){
                //引数にidと指定することでDeletePost関数内のidという変数にonclickで指定した$post->idが格納される
                
                'use strict'
                
                if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                    //confirmはポップアップ表示時に表示する文章を表現できる
                    
                    document.getElementById(`form_${id}`).submit();//削除formの送信のためのコード
                    //getElementById関数によって送信したいformを指定する
                    //getElementById引数にidを指定することで設定したidを持つHTMLの要素を取得できる
                    //今回はformの要素が欲しいのでdeleteボタンを押した投稿の中にあるform要素のidを引数とし設定する
                    //！！注意！！　<button id="btn">引く</button>HTMLでのbuttomタグに移動
                    //｛｛重要｝｝　JavaScriptでは、バッククオートの中で変数を${}で囲むことで文字列の中で変数を扱うことができる
                    
                }
            }
        </script>
    </body>
</html>
