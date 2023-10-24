<div>
    <h3 class="rounded-t-lg bg-secondary-light p-4 text-center text-xl font-bold dark:bg-secondary-dark">
        {{ __('me_str.related_videos') }}
    </h3>
    <ul class="grid gap-2 rounded-b-lg border-8 border-secondary-light p-2 dark:border-secondary-dark"
        x-data="{
            videos: [
                'https://www.youtube.com/embed/0gMPHDQTosw',
                'https://www.youtube.com/embed/m139Reb3hmQ',
            ]
        }">
        <template x-for="url in videos">
            <li>
                <iframe :title="url" class="w-[100%]" :src="url" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                    allowfullscreen></iframe>
            </li>
        </template>
    </ul>
</div>
