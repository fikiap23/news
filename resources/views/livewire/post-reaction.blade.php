<!-- start post Reaction -->
<div>
    <div class="row">
        <div class="post-reaction">
            <h4 class="title-reactions mt-3 mb-3">Bagimana Reaksi Anda ?</h4>
            <div class="emoji">
                <div>
                    <div class="d-block position-relative text-center float-left">
                        <span class="emoji-id" data-emoji="{{ \App\Models\PostReactionEmoji::LIKE }}"
                            data-post="{{ $postId }}">&#128512;</span>
                        <label
                            class="post-reaction-count">{{ isset($countEmoji[2]) ? count($countEmoji[2]) : 0 }}</label>
                    </div>
                </div>
            </div>
            <div class="emoji">
                <div>
                    <div class="d-block position-relative text-center float-left">
                        <span class="emoji-id" data-emoji="{{ \App\Models\PostReactionEmoji::FUNNY }}"
                            data-post="{{ $postId }}">&#128514;</span>
                        <label
                            class="post-reaction-count">{{ isset($countEmoji[3]) ? count($countEmoji[3]) : 0 }}</label>
                    </div>
                </div>
            </div>
            <div class="emoji">
                <div>
                    <div class="d-block position-relative text-center float-left">
                        <span class="emoji-id" data-emoji="{{ \App\Models\PostReactionEmoji::LOVE }}"
                            data-post="{{ $postId }}">&#128536;</span>
                        <label
                            class="post-reaction-count">{{ isset($countEmoji[4]) ? count($countEmoji[4]) : 0 }}</label>
                    </div>
                </div>
            </div>
            <div class="emoji">
                <div>
                    <div class="d-block position-relative text-center float-left">
                        <span class="emoji-id" data-emoji="{{ \App\Models\PostReactionEmoji::WOW }}"
                            data-post="{{ $postId }}">&#128563;</span>
                        <label
                            class="post-reaction-count">{{ isset($countEmoji[7]) ? count($countEmoji[7]) : 0 }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end post Reaction -->
