<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Football Academy</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav>
    <div class="logo">Football Academy</div>
    <div class="group">
      <a href="{{ route('players.index') }}" class="item">Home</a>
      <a href="{{ route('AboutUs') }}" class="item">About Us</a>
      <a href="{{ route('ContactUs') }}" class="item">Contact Us</a>
    </div>
  </nav>

  <div class="container">
    @if(session('success'))
      <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="player-form">
      @if ($editPlayer)
        <h2>Edit Player</h2>
        <form action="{{ route('players.update', $editPlayer->id) }}" method="POST">
          @csrf
          @method('PUT')
      @else
        <h2>Add Player</h2>
        <form action="{{ route('players.store') }}" method="POST">
          @csrf
      @endif

        <input 
          type="text" 
          name="name" 
          placeholder="Name" 
          value="{{ old('name', $editPlayer->name ?? '') }}">
        @error('name')<div class="error">{{ $message }}</div>@enderror

        <input 
          type="email" 
          name="email" 
          placeholder="Email" 
          value="{{ old('email', $editPlayer->email ?? '') }}">
        @error('email')<div class="error">{{ $message }}</div>@enderror

        <button type="submit" class="btn btn-primary">
          {{ $editPlayer ? 'Update' : 'Add' }} Player
        </button>

        @if ($editPlayer)
          <a href="{{ route('players.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
        @endif
      </form>
    </div>

    <div class="playertable">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($players as $player)
            <tr>
              <td>{{ $player->name }}</td>
              <td>{{ $player->email }}</td>
              <td>
                <a 
                  href="{{ route('players.index', ['edit_id' => $player->id]) }}" 
                  class="btn btn-secondary btn-sm">
                  Edit
                </a>
                <form 
                  action="{{ route('players.destroy', $player->id) }}" 
                  method="POST" 
                  style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button 
                    type="submit" 
                    class="btn btn-danger btn-sm" 
                    onclick="return confirm('Are you sure?')">
                    Delete
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
