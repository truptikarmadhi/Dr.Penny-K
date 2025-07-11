import Handlebars from 'handlebars';

export class Handlebar {
    init() {
        this.postHandle();
        this.ServiceCard();
    }

    postHandle() {
        $(document).ready(function () {
            let currentPage = 1;
            const postsPerPage = 9;
            let allPostsLoaded = false;

            function loadPosts(category, page) {
                if (allPostsLoaded) return; // Don't load if already reached the end

                $.ajax({
                    url: ajax_params.ajax_url,
                    method: 'POST',
                    data: {
                        action: 'load_posts',
                        category: category,
                        page: page,
                        posts_per_page: postsPerPage,
                    },
                    success: function (response) {
                        if (response.success && response.data.posts.length > 0) {
                            renderPosts(response.data.posts);

                            // If less than the max posts are returned, assume no more posts
                            if (response.data.posts.length < postsPerPage) {
                                $('#loadMoreButton').hide();
                                allPostsLoaded = true;
                            } else {
                                $('#loadMoreButton').show();
                            }
                        } else {
                            $('#loadMoreButton').hide();
                            allPostsLoaded = true;
                        }
                    },
                    error: function (error) {
                        console.error('Error fetching posts:', error);
                    },
                });
            }

            function renderPosts(posts) {
                const source = $("#post-template").html();
                const template = Handlebars.compile(source);
                const html = template({ posts });
                $('#postsContainer').append(html);
            }

            $('.blog-filter-button').click(function () {
                currentPage = 1;
                allPostsLoaded = false;
                $('#postsContainer').empty();

                const category = $(this).data('tag');
                $('.blog-filter-button').removeClass('active');
                $(this).addClass('active');

                loadPosts(category, currentPage);
            });

            $('#loadMoreButton').click(function () {
                currentPage++;
                const category = $('.blog-filter-button.active').data('tag');
                loadPosts(category, currentPage);
            });

            loadPosts('all', currentPage);
        });
    }

    ServiceCard() {
        $(document).ready(function () {
            let currentPage = 1;
            const postsPerPage = 4;

            function loadTeam(page) {
                $.ajax({
                    url: ajax_params.ajax_url,
                    method: 'POST',
                    data: {
                        action: 'load_service',
                        page: page,
                        posts_per_page: postsPerPage,
                    },
                    success: function (response) {
                        if (response.success) {
                            renderPosts(response.data.posts);
                        }
                    },
                    error: function (error) {
                        console.error('Error fetching posts:', error);
                    },
                });
            }

            function renderPosts(posts) {
                // Service cards
                const source = $("#service-template").html();
                const template = Handlebars.compile(source);
                const html = template({ posts });
                $('#serviceContainer').append(html);

                // Menu list
                const listSource = $("#service-list-template").html();
                const listTemplate = Handlebars.compile(listSource);
                const listHtml = listTemplate({ posts });
                $('#serviceMenuList').append(listHtml);
            }

            loadTeam('all', currentPage);
        });
    }
}