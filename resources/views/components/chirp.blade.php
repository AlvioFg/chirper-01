@props(['chirp'])

<div class="card bg-base-100 shadow">
    <div class="card-body">
        <div class="flex items-start gap-4">
            @if($chirp->user)
                <div class="avatar">
                    <div class="w-10 h-10 rounded-full object-cover shrink-0">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}"
                             alt="{{ $chirp->user->name }}'s avatar"
                             class="rounded-full" />
                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="w-10 h-10 rounded-full object-cover shrink-0">
                        <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth"
                             alt="Anonymous User"
                             class="rounded-full" />
                    </div>
                </div>
            @endif

            <div class="min-w-0">
                <div class="flex items-center gap-1">
                    <span class="text-sm font-semibold">{{ $chirp->user ? $chirp->user->name : 'Anonymous' }}</span>
                    <span class="text-base-content/60">·</span>
                    <span class="text-sm text-base-content/60">{{ $chirp->created_at->diffForHumans() }}</span>
                </div>

                <div class="flex gap-1">
                    <a href="/chirper/{{ $chirp->id }}/edit" class="btn btn-ghost btn-xs">
                        Edit
                    </a>
                    <form method="post" action="/chirper/{{ $chirp->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Beneran ek dihapus ieu teh?')"
                                class="btn btn-ghost btn-xs text-error">
                            Delete
                        </button>
                    </form>
                </div>

                <p class="mt-1">
                    {{ $chirp->message }}
                </p>
            </div>
        </div>
    </div>
</div>
