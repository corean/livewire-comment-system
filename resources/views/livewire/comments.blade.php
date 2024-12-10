<div>

    <h2>Comments ({{ $comments->count() }})</h2>

    @auth
        <form class="mt-4">
            <div>
                <x-textarea wire:model="form.body"
                            class="w-full"
                            placeholder="Post a comment"
                            rows="4"
                />
                <x-input-error :messages="$errors->get('form.body')"/>
                <x-primary-button
                        wire:click.prevent="addComment"
                        class="mt-2">Post a comment
                </x-primary-button>

            </div>
        </form>
    @endauth

    <div class="mt-8 px-6">
        @forelse($comments as $comment)
            <div class="border-b border-gary-100 last:border-b-0" wire:key="{{ $comment->id }}">
                <livewire:comment-item :comment="$comment" :key="$comment->id"/>
            </div>
        @empty
            <p>No comments yet</p>
        @endforelse
    </div>
</div>
