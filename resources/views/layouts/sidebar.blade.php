<nav
    id="page-sidebar"
    class="fixed bottom-0 start-0 top-0 z-50 flex h-full  border-slate-200/75 bg-white transition-transform duration-500 ease-out dark:border-slate-700/60 dark:bg-slate-900  lg:translate-x-0 lg:shadow-none ltr:border-r ltr:lg:translate-x-0 rtl:border-l rtl:lg:translate-x-0"
    x-bind:class="{
               'ltr:-translate-x-full rtl:translate-x-full': !mobileSidebarOpen,
                'translate-x-0 shadow-lg': mobileSidebarOpen,
               }"
    aria-label="Main Sidebar Navigation"
    x-cloak>
    <!-- Mini Sidebar -->
    <div
        class="w-16 flex-none border-slate-200/75 bg-slate-50  ltr:border-r rtl:border-l">
        <!-- Brand -->

        <!-- END Brand -->

        <!-- App Navigation -->
        <nav
            class="relative flex flex-col items-center gap-3 py-6"
            x-on:keydown.right.prevent.stop="$focus.wrap().next()"
            x-on:keydown.left.prevent.stop="$focus.wrap().previous()"
            x-on:keydown.down.prevent.stop="$focus.wrap().next()"
            x-on:keydown.up.prevent.stop="$focus.wrap().previous()"
            x-on:keydown.home.prevent.stop="$focus.first()"
            x-on:keydown.end.prevent.stop="$focus.last()">

            <button
                id="analytics-tab"
                role="tab"
                aria-controls="analytics-tab-pane"
                type="button"
                class="flex size-9 items-center justify-center rounded-xl bg-green-700 text-white hover:bg-green-600 active:bg-green-700">
                <a href="{{ route('annonces') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="20" height="20" fill="currentColor"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path d="M543.8 287.6c17 0 32-14 32-32.1c1-9-3-17-11-24L512 185l0-121c0-17.7-14.3-32-32-32l-32 0c-17.7 0-32 14.3-32 32l0 36.7L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1l32 0 0 69.7c-.1 .9-.1 1.8-.1 2.8l0 112c0 22.1 17.9 40 40 40l16 0c1.2 0 2.4-.1 3.6-.2c1.5 .1 3 .2 4.5 .2l31.9 0 24 0c22.1 0 40-17.9 40-40l0-24 0-64c0-17.7 14.3-32 32-32l64 0c17.7 0 32 14.3 32 32l0 64 0 24c0 22.1 17.9 40 40 40l24 0 32.5 0c1.4 0 2.8 0 4.2-.1c1.1 .1 2.2 .1 3.3 .1l16 0c22.1 0 40-17.9 40-40l0-16.2c.3-2.6 .5-5.3 .5-8.1l-.7-160.2 32 0z" />
                    </svg>
                </a>
            </button>


            <button
                x-on:click="activeTab = 'categories'"
                x-on:focus="activeTab = 'categories'"
                id="categories-tab"
                role="tab"
                aria-controls="categories-tab-pane"
                x-bind:aria-selected="activeTab === 'categories' ? 'true' : 'false'"
                x-bind:tabindex="activeTab === 'categories' ? '0' : '-1'"
                type="button"
                class="flex size-9 items-center justify-center rounded-xl bg-indigo-800 text-white hover:bg-indigo-700 active:bg-indigo-800"
                x-bind:class="{
                               'ring-4 ring-indigo-400/50 dark:ring-indigo-600/50': activeTab === 'categories'
                              }">
                <a href="{{ route('categories') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z" />
                    </svg>
                </a>
            </button>


            <button
                x-on:focus="activeTab = 'article'"
                x-on:click="activeTab = 'article'"
                id="article-tab"
                role="tab"
                aria-controls="article-tab-pane"
                x-bind:aria-selected="activeTab === 'article' ? 'true' : 'false'"
                x-bind:tabindex="activeTab === 'article' ? '0' : '-1'"
                type="button"
                class="flex size-9 items-center justify-center rounded-xl bg-indigo-800 text-white hover:bg-indigo-700 active:bg-indigo-800"
                x-bind:class="{
                             'ring-4 ring-indigo-400/50 dark:ring-indigo-600/50': activeTab === 'article'
                              }">
                <a href="{{ route('annonces.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path d="M96 96c0-35.3 28.7-64 64-64l288 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L80 480c-44.2 0-80-35.8-80-80L0 128c0-17.7 14.3-32 32-32s32 14.3 32 32l0 272c0 8.8 7.2 16 16 16s16-7.2 16-16L96 96zm64 24l0 80c0 13.3 10.7 24 24 24l112 0c13.3 0 24-10.7 24-24l0-80c0-13.3-10.7-24-24-24L184 96c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16z" />
                    </svg>
                </a>
            </button>
            




            <!-- <button
                            x-on:click="activeTab = 'Settings'"
                            x-on:focus="activeTab = 'Settings'"
                            id="settings-tab"
                            role="tab"
                            aria-controls="settings-tab-pane"
                            x-bind:aria-selected="activeTab === 'Settings' ? 'true' : 'false'"
                            x-bind:tabindex="activeTab === 'Settings' ? '0' : '-1'"
                            type="button"
                            class="flex size-9 items-center justify-center rounded-xl bg-slate-700 text-white hover:bg-slate-600 active:bg-slate-700"
                            x-bind:class="{
                            'ring-4 ring-slate-400/50 dark:ring-slate-600/50': activeTab === 'Settings'
                          }">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 16 16"
                                fill="currentColor"
                                class="hi-micro hi-cog-8-tooth inline-block size-4">
                                <path
                                    fill-rule="evenodd"
                                    d="M6.955 1.45A.5.5 0 0 1 7.452 1h1.096a.5.5 0 0 1 .497.45l.17 1.699c.484.12.94.312 1.356.562l1.321-1.081a.5.5 0 0 1 .67.033l.774.775a.5.5 0 0 1 .034.67l-1.08 1.32c.25.417.44.873.561 1.357l1.699.17a.5.5 0 0 1 .45.497v1.096a.5.5 0 0 1-.45.497l-1.699.17c-.12.484-.312.94-.562 1.356l1.082 1.322a.5.5 0 0 1-.034.67l-.774.774a.5.5 0 0 1-.67.033l-1.322-1.08c-.416.25-.872.44-1.356.561l-.17 1.699a.5.5 0 0 1-.497.45H7.452a.5.5 0 0 1-.497-.45l-.17-1.699a4.973 4.973 0 0 1-1.356-.562L4.108 13.37a.5.5 0 0 1-.67-.033l-.774-.775a.5.5 0 0 1-.034-.67l1.08-1.32a4.971 4.971 0 0 1-.561-1.357l-1.699-.17A.5.5 0 0 1 1 8.548V7.452a.5.5 0 0 1 .45-.497l1.699-.17c.12-.484.312-.94.562-1.356L2.629 4.107a.5.5 0 0 1 .034-.67l.774-.774a.5.5 0 0 1 .67-.033L5.43 3.71a4.97 4.97 0 0 1 1.356-.561l.17-1.699ZM6 8c0 .538.212 1.026.558 1.385l.057.057a2 2 0 0 0 2.828-2.828l-.058-.056A2 2 0 0 0 6 8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button> -->

        </nav>
        <!-- END App Navigation -->
    </div>
    <!-- END Mini Sidebar -->

    <!-- Sidebar Content -->

    <!-- END Sidebar Content -->
</nav>