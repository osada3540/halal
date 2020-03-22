@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                @if ($user->profile_photo)
               <p>
                <img class="round-img" src="{{ asset('storage/user_images/' . $user->profile_photo) }}" alt="..."/>
               </p>
               @else
               <img class="round-img" src="{{ asset('/images/blank_profile.png') }}" alt="..."/>
               @endif
                
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        <p><a href="/users/{{ $user->id }}">View Profile</a></p>
                    </div>
                    <div>
                        {{ $user->profile_text }}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $users->links('pagination::bootstrap-4') }}
@endif
