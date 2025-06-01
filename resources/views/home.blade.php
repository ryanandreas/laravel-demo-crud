<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  
  @auth
  <p>you are logged in Change Commit 1</p>
  <form action="/logout" method="POST">
    @csrf
    <button>Log Out</button>
  </form>
  <div style="border: 3px solid black;">
    <h2>Create new post</h2>
    <form action="/create-post" method="POST">
      @csrf
      <input type="text" name="title" placeholder="title">
      <textarea name="body" placeholder="bodycontent....."></textarea>
      <button>Save Post</button>
    </form>
  </div>

  <div style="border: 3px solid black;">
    <h2>all post</h2>
    @foreach ($posts as $post)
    <div style="background-color: gray; padding: 10px; margin: 10px;">
      <h3>{{$post['title']}} By {{$post->user->name}}</h3>
      {{$post['body']}}
      <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
      <form action="/delete-post/{{$post->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button>DELETE</button>
      </form>

    </div>
        
    @endforeach
   
  </div>


  @else
  <div style="border: 3px solid black;">
    <h2>register</h2>
    <form action="/register" method="POST">
      @csrf
      <input name="name" type="text" placeholder="name">
      <input name="email" type="text" placeholder="email">
      <input name="password" type="password" placeholder="password">
      <button>Register</button>
    </form>
  </div>

  <div style="border: 3px solid black;">
    <h2>Login</h2>
    <form action="/login" method="POST">
      @csrf
      <input name="loginname" type="text" placeholder="name">
      <input name="loginpassword" type="password" placeholder="password">
      <button>Login</button>
    </form>
  </div>

  @endauth

</body>
</html>