<?php

function daily_news_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('daily-news-main-style') );
}
add_action( 'wp_enqueue_scripts', 'daily_news_parent_theme_enqueue_styles' );

function get_new_tipranks_header() {
    ?>

    <header class="client-components-header-header__header">
        <div class="client-components-header-header__mainMenuWrapper">
            <div class="client-components-header-header__mainMenu">
                <div class="client-components-header-header__logo">
                    <a href="http://tipranks.com/" class="active">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGEAAAAbCAYAAABsv+EEAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RTZFRkNCQTJBOEMwMTFFNUIxNEFDQjE1ODkzNTQxOUEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RTZFRkNCQTNBOEMwMTFFNUIxNEFDQjE1ODkzNTQxOUEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpFNkVGQ0JBMEE4QzAxMUU1QjE0QUNCMTU4OTM1NDE5QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpFNkVGQ0JBMUE4QzAxMUU1QjE0QUNCMTU4OTM1NDE5QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PtqxSFMAAAdKSURBVHja7FkLbFRFFH1vd1sKqFBFrIpaRRAV5BMsfqgRK59CVMQCRX6VjxYlWCBqNIqiIUrE8BMMFAqNgEQLFGmANlYRJELCT/kaayhQKOHbQmW723af56736WV8u/sK6W5rmORk5s3c+d07c+fe+xzataQZ1ZfaGzXe5YbhizEMo5Nxecqo6/kdV9rRk5vQyLP2sScbvAC8F99Dthd4MVJrcLgXuXLci6NGubMa32anQ+WqjrdWru6SieJJYKlfIHlPzfGs7xndUBjvu1Ta0+c+XeDznG+Gz9aRXo8LeIFBSXdnxybruvNgzIgzxX6mfxWva7qzu+ZwDdF018+oOgaMYfpyzp8F2nk2JPdvlLzhUr0WQEXJWl6vf7/1YU1W6ugt4HDlsrj9lctbxaP8DrAZGAfcFGSsnkCeJ/+ZJvWK6ef2dfOVHZrrKy8q4Kq76tvBcAVpewBoDkTVYrweQFtgTyQ3VXNqexxubUvd4aJDto2rf6mvt9NRF4N6Cp5P936X0swufdWOKXrVrg9jrpr5pZu71Jzcuh7F48CAhvJGuepo3EeAl7yFqb2ik1aWWzJ+26QOOK2D/G+NpnUFVlXtntYUdfmoWxD10OQTIZl+ZF0S3qs+oE9Ev49Q1QZIbmgWmqsOx04ACrw/DOsV3WOZXxDeLa+0BsPiox+fV4jPXxV6J9CNsbtq7+xo3eFMA3ML0ScXeYnmcKYgT8R3Z9c9A4nuM6Aj94/SGmhy1fH4JIg076a0HDBwFTM4Gyi00bcJn2rCHcAsYJlilf0vkiMMc5AZeDML4FoKcBMmKHWzST9zuQSgh+4sf5Opekb0ucD5+8ANog+d2J2iz3HR5yDncl63Mi+pqkaChqytc+Lbw/knLGCzz2FBs53XYn6ftujjVtZaFQkh6JWLnR/Ugp7MPR+brybDCX3UaACrjKPATzGja07902AY6cjiVIOKBXqI6HVd9wQMMxjGUH6AzbQO9Dst6OQ8FfR+gM6woMtgU5zSSoCstN2CZCL6zRL0nZDJcM0etG/itmbs+Cbw3MSr83zw8nhsvw/MOEJvmotPsd00mxc8kr9/BHJDjFENQVOYIwPC8CJPF4+pVTqPzdDGsy0YRu/EF8D1ovpBYKDFOOo8dOrnWdBlCAeOblxxkANwA+/XpCcN0YnbBiNbAAQyzdsD+4D+dNCAFLIggU2OMKm8cfyw2kmxFJPCph61aBugCMAfMgFtcxvjTgfd3Ve5l88Vj3s4DksJxn0Y5eWKAMpYDftEXQ5QxHE3Up3TSF2TEDorKBWdZihtn4ZY5AVmYhyrqKOibSxuhMrAqdiEzu/JRKVtqMX4I0R5P+cUOBxkg4FNgSww7IriRXzSh0uhYukbuPwym9iUKHaWhLZYoBXvLYXfrEpWuSV8K+nd2uqCirgsxABGecXncYv2oGsFfRmX80FLDlSmuBH3Wz5Mun6RbgqpIeR3cnWcwgTa0NOmytL+juCah4KYszCYU85+BOnyVwOopWACuJ3VoJm2Au+K73hRLsZ+vhd7+1MYHKZhYKbccJiopy3M1UAbbYzsRlH1h8Ut0MXi14i27iFUzdyrVEvZfMPNdyAVzK0W7cdkzA3jLwFaRNxPwC3QFTXh5asoU3MsNh5IRHk1cJ240guDqKI1YAIJaZeoC/ZTZguw5ArVElk6Seo7oNBksUVopjRSxZhjPu0v3EJoAuYvBVawzpaMyYSqUj3d1/mB2izMXLo9A5jJ5i2hWNR94t0xw9LfBBCSFsAKMk+sqZbsJGl+HxBzS3VK1s5YPmhmaswGSRHWT7fPGS4hRLH5OkTR/18Dk2z0J7u5KzaVr9SPFOVvhR+RK+rbYqMJAR0iXSfhjbFQS94Qa1ohVQ3wdoDxF7MZmiWcSTMm9iYwM1xCMJiRR9gaIG+0L27AYPYR1ER/uV5jeo3Nvzy2x81bQJ5zqujTD3XFBJQ3KuMND+qZ6jqd4kVCLWWy6guWdiiCmIq5nwgw/u/AaI51kWVZI5rHo1/LcATwLoDZ8bWgJ2+T9GYBO0rEmA5svZgMfU54tKYfERtgvFSMNQljBgs/TAZ6M6OSbIYqJjDtLXxwV5DnjHnOBBAGqdQ3QEMm+hxhlLQDTkUigBc6dqLr5MBMEVXDsIF+Frq+mC0ViRzR3sIihBJKLUXZWN9Z1vlmIpM123zckc8Aelt0rVG+KyIVRbWb6MTIX5ALsLE2ClPngCFpEmyBnbCrkoRaWljLg7KOhW6mvnyrKN1LqhHrpUeYhDMX2KiYxqXaf/+h1C8hsN2dLkw9Om1fCk9UU5wes5/B5q0MY9j5tTo5WJwoiIUlBf6xYgy05ps7nlWeQ5jcIxXfIuibcIDjHlbOlsahCPPEFjGN+X3RxkZ+E+WTCkO3kTmn/fuLsg37FmRt0KN3NMCYFLdJlM6bMk+5hfAqMNcoxWop50CfvJHnRJ8y7jNdtJO1NJ+trAR+a4j51cwf+oE1U5rcavpLgAEAkASmgon8dC4AAAAASUVORK5CYII=" alt="TipRanks" class="client-components-header-header__img">
                    </a>
                </div>
                <div class="client-components-header-header__rightSide">
                    <div class="client-components-header-header__table"><div class="client-components-header-header__headerSearchWrapper">
                            <div class="client-components-header-header-search__wrapper client-components-header-header-search__stretch">
                                <div class="client-components-header-header-search__stretch">
                                    <div class="client-components-header-header-search__searchWrapper">
                                        <div class="client-components-header-header-search__autoComplete">
                                            <div class="categoryMenuWrapper">
                                                <div class="client-components-search-category-menu__wrapper categoryMenu">
                                                    <button class="client-components-search-category-menu__button">
                                                        <svg class="client-components-search-category-menu__svg" width="19" height="18">
                                                            <g><rect stroke="#fff" fill="#fff" rx="1" x="0.5" y="1" width="17" height="2"></rect><rect stroke="#fff" fill="#fff" rx="1" x="0.5" y="7.5" width="17" height="2"></rect><rect stroke="#fff" fill="#fff" rx="1" x="0.5" y="14" width="17" height="2">

                                                                </rect>
                                                            </g>
                                                        </svg>
                                                        <div class="client-components-search-category-menu__arrow">

                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                            <form class="client-components-search-auto-complete__form">
                                                <input class="client-components-search-auto-complete__input" placeholder="Type a Stock" value="" name="top_search_autocomplete">
                                                <img src="http://tipranks.com/new-images/loading_smallest.gif" class="client-components-search-auto-complete__loader">
                                            </form>
                                        </div>
                                        <button class="client-components-header-header-search__button">
                                            <span class="client-components-header-header-search__searchText"></span>
                                            <svg viewBox="0 0 19 19" class="client-components-header-header-search__svg" width="20" height="20">
                                                <g>
                                                    <circle stroke="#4a4a4a" stroke-width="2" r="5.93182" cy="7.4761" cx="11.28069" fill="none">

                                                    </circle>
                                                    <rect stroke="#4a4a4a" fill="#4a4a4a" transform="rotate(-46.08245849609375 4.646808624267575,14.25326633453369) " height="4.06636" width="6.183" y="12.22009" x="1.55531">

                                                    </rect>
                                                </g>
                                            </svg>
                                        </button>

                                        <div class="client-components-header-header-search__searchResults">
                                            <div>
                                                <div class="client-components-search-search-results__wrapper undefined" style="display: none;">
                                                    <ul>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="client-components-header-header__goPro">
                            <a class="client-components-header-header__goProLink" href="http://tipranks.com/go-pro?llf=gopro-btn">Go Pro</a>
                        </div>
                        <div class="client-components-header-header__menu">
                            <nav class="client-components-header-header-menu__nav">
                                <ul class="client-components-header-header-menu__navList">
                                    <li class="client-components-header-header-menu__li">
                                        <div class="client-components-header-header-menu__tagWrapper">

                                        </div>
                                        <a href="http://tipranks.com/smart-portfolio" class="client-components-header-header-menu__button" to="" type="href">
                                            <span>
                                                <svg class="dashboard" width="19" height="16" style="vertical-align: middle; margin-right: 0.5625rem;">
                                                    <g>
                                                        <path fill="#F19920" d="M11.045,14.597c0-0.072-0.06-0.132-0.133-0.132H8.087c-0.073,0-0.133,0.06-0.133,0.132v0.442 c0,0.072-0.06,0.132-0.132,0.132H5.803c-0.073,0-0.133,0.059-0.133,0.131v0.565C5.67,15.941,5.73,16,5.803,16h7.394 c0.073,0,0.132-0.059,0.132-0.132v-0.565c0-0.072-0.06-0.131-0.132-0.131h-2.02c-0.073,0-0.132-0.06-0.132-0.132V14.597 L11.045,14.597z">

                                                        </path>
                                                        <path fill="#F19920" d="M17.936,0H1.064C0.478,0,0,0.475,0,1.059v11.66c0,0.583,0.478,1.059,1.064,1.059h16.871 c0.587,0,1.064-0.475,1.064-1.059V1.059C19,0.475,18.522,0,17.936,0z M9.5,12.863c-0.265,0-0.479-0.214-0.479-0.477 c0-0.264,0.214-0.477,0.479-0.477s0.479,0.213,0.479,0.477C9.979,12.649,9.765,12.863,9.5,12.863z M18.194,11.395H0.806V1.059 c0-0.14,0.119-0.257,0.259-0.257h16.871c0.14,0,0.259,0.118,0.259,0.257V11.395L18.194,11.395z">

                                                        </path>
                                                        <path fill="#F19920" d="M16.033,3.227c-0.164-0.125-0.399-0.093-0.524,0.07l-2.751,3.583l-3.271-1.73 C9.191,4.992,8.81,5.085,8.62,5.36L6.454,8.506c-0.019,0.023-0.08,0.055-0.107,0.057H3.194c-0.207,0-0.374,0.167-0.374,0.372 c0,0.206,0.167,0.372,0.374,0.372h3.152c0.268,0,0.572-0.16,0.723-0.379l2.128-3.09l3.256,1.723 c0.288,0.152,0.669,0.069,0.867-0.188l2.783-3.624C16.228,3.584,16.197,3.351,16.033,3.227z">

                                                        </path>
                                                    </g>
                                                </svg>
                                                <span style="vertical-align: middle;">Smart Portfolio</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="client-components-header-header-menu__li client-components-header-header-menu__tools">
                                        <div class="client-components-header-header-menu__tagWrapper">

                                        </div>
                                        <a class="client-components-header-header-menu__button" to="" type="href">Research Tools</a>
                                        <div class="client-components-header-header-menu__list client-components-header-header-menu__toolsList">
                                            <div>
                                                <div class="client-components-header-header-menu__arrow client-components-header-header-menu__toolsArrow"></div>
                                                <ul class="client-components-header-header-menu__innerList">
                                                    <li class="client-components-header-header-menu__menuItemWrapper level-1">
                                                        <div class="textWrapper itemHasItems level-1">
                                                            <div class="link text" type="div">Top Stocks</div>
                                                        </div>
                                                        <ul class="list level-1">
                                                            <li class="client-components-header-header-menu__menuItemWrapper level-2">
                                                                <div class="textWrapper itemNoItems level-2">
                                                                    <a href="http://tipranks.com/stocks/top-rated" class="link text">Analysts' Top Stocks</a>
                                                                </div>
                                                            </li>
                                                            <li class="client-components-header-header-menu__menuItemWrapper level-2">
                                                                <div class="textWrapper itemNoItems level-2">
                                                                    <a href="http://tipranks.com/insiders/hot-stocks" class="link text">Insiders' Hot Stocks</a>
                                                                    <div class="tag popular">popular</div>
                                                                </div>
                                                            </li>
                                                            <li class="client-components-header-header-menu__menuItemWrapper level-2">
                                                                <div class="textWrapper itemNoItems level-2">
                                                                    <a class="link text" href="http://tipranks.com/trending-stocks">Trending Stocks</a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="client-components-header-header-menu__menuItemWrapper level-1">
                                                        <div class="textWrapper itemHasItems level-1">
                                                            <div class="link text" type="div">Screeners</div>
                                                        </div>
                                                        <ul class="list level-1">
                                                            <li class="client-components-header-header-menu__menuItemWrapper level-2">
                                                                <div class="textWrapper itemNoItems level-2">
                                                                    <a class="link text" href="http://tipranks.com/screener/stocks">Stock Screener</a>
                                                                    <div class="tag new">new</div>
                                                                </div>
                                                            </li>
                                                            <li class="client-components-header-header-menu__menuItemWrapper level-2">
                                                                <div class="textWrapper itemNoItems level-2">
                                                                    <a class="link text" href="http://tipranks.com/screener/etfs">ETF Screener</a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="client-components-header-header-menu__menuItemWrapper level-1">
                                                        <div class="textWrapper itemHasItems level-1">
                                                            <div class="link text" type="div">Calendars</div>
                                                        </div>
                                                        <ul class="list level-1">
                                                            <li class="client-components-header-header-menu__menuItemWrapper level-2">
                                                                <div class="textWrapper itemNoItems level-2">
                                                                    <a class="link text" href="http://tipranks.com/calendars/earnings">Earnings Calendar</a>
                                                                </div>
                                                            </li>
                                                            <li class="client-components-header-header-menu__menuItemWrapper level-2">
                                                                <div class="textWrapper itemNoItems level-2">
                                                                    <a class="link text" href="http://tipranks.com/calendars/dividends">Dividend Calendar</a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="client-components-header-header-menu__menuItemWrapper block-chosen level-1">
                                                        <div class="textWrapper itemHasItems level-1">
                                                            <div class="link text" type="div">TipRanks Newsletter</div>
                                                        </div>
                                                        <ul class="list level-1">
                                                            <li class="client-components-header-header-menu__menuItemWrapper block-chosen level-2">
                                                                <div class="textWrapper itemNoItems level-2">
                                                                    <a class="link text" href="http://tipranks.com/smart-investor/pricing/?llf=smart-investor-nl-menu">Smart Investor</a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <ul class="client-components-header-header-menu__innerList">
                                                    <li class="client-components-header-header-menu__menuItemWrapper level-1">
                                                        <div class="textWrapper itemHasItems level-1">
                                                            <div class="link text" type="div">Daily Feeds</div>
                                                        </div>
                                                        <ul class="list level-1">
                                                            <li class="client-components-header-header-menu__menuItemWrapper level-2">
                                                                <div class="textWrapper itemNoItems level-2">
                                                                    <a class="link text" href="http://tipranks.com/ratings">Daily Analyst Ratings</a>
                                                                </div>
                                                            </li>
                                                            <li class="client-components-header-header-menu__menuItemWrapper level-2">
                                                                <div class="textWrapper itemNoItems level-2">
                                                                    <a class="link text" href="http://tipranks.com/inside-trading">Daily Insider Transactions</a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="client-components-header-header-menu__menuItemWrapper level-1">
                                                        <div class="textWrapper itemHasItems level-1">
                                                            <div class="link text" type="div">Top Lists</div>
                                                        </div>
                                                        <ul class="list level-1">
                                                            <li class="client-components-header-header-menu__menuItemWrapper level-2">
                                                                <div class="textWrapper itemNoItems level-2">
                                                                    <a class="link text" href="http://tipranks.com/top-experts">Expert Center</a>
                                                                </div>
                                                                <ul class="list level-2">
                                                                    <li class="client-components-header-header-menu__menuItemWrapper level-3">
                                                                        <div class="textWrapper itemNoItems level-3">
                                                                            <a class="link text active" href="http://tipranks.com/analysts/top">Top 25 Wall Street Analysts</a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="client-components-header-header-menu__menuItemWrapper level-3">
                                                                        <div class="textWrapper itemNoItems level-3">
                                                                            <a class="link text" href="http://tipranks.com/bloggers/top">Top 25 Financial Bloggers</a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="client-components-header-header-menu__menuItemWrapper level-3">
                                                                        <div class="textWrapper itemNoItems level-3">
                                                                            <a class="link text" href="http://tipranks.com/insiders/top">Top 25 Corporate Insiders</a>
                                                                        </div>
                                                                    </li>
                                                                    <li class="client-components-header-header-menu__menuItemWrapper level-3">
                                                                        <div class="textWrapper itemNoItems level-3">
                                                                            <a class="link text" href="http://tipranks.com/hedge-funds/top">Top 25 Hedge Fund Managers</a>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="client-components-header-header-menu__menuItemWrapper level-2">
                                                                <div class="textWrapper itemNoItems level-2">
                                                                    <a class="link text" href="http://tipranks.com/firms/top">Top Performing Research Firms</a>
                                                                    <div class="tag new">new</div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="client-components-header-header-menu__menuItemWrapper level-1">
                                                        <div class="textWrapper itemHasItems level-1">
                                                            <div class="link text" type="div">For Institutions</div>
                                                        </div>
                                                        <ul class="list level-1">
                                                            <li class="client-components-header-header-menu__menuItemWrapper level-2">
                                                                <div class="textWrapper itemNoItems level-2">
                                                                    <a class="link text" href="http://tipranks.com/get-api">API for Institutions</a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="client-components-header-header__inbox">
                            <div class="client-components-notification-inbox-notification-inbox__inbox">
                                <button class="client-components-notification-inbox-notification-inbox__bellButton" data-unread-notifications="0">
                                    <!-- i class="tipranks-icon" data-icon="" data-icon-name="bell" style="font-size: 20px;"></i -->
                                    <i class="fa fa-bell" style="font-size: 15px;"></i>
                                </button>
                                <div class="client-components-notification-inbox-notification-inbox__notificationArea">
                                    <header>
                                        <h3>Notifications</h3>
                                        <button>Mark all as read</button>
                                    </header>
                                    <footer>
                                        <div class="client-components-notification-inbox-notification-inbox__notFollowing">
                                            <p>
                                                <span>Stay on top of your holdings, open your <a href="http://tipranks.com/smart-portfolio?ref=notifications-window">Smart Portfolio</a> today!</span>
                                            </p>
                                            <div class="client-components-notification-inbox-notification-inbox__divider">
                                                <hr>
                                                <span>or</span>
                                            </div>
                                            <p>
                                                <span>Start following <a href="http://tipranks.com/top-experts?ref=notifications-window">Best Performing Experts</a></span>
                                                <a class="client-components-notification-inbox-notification-inbox__button" href="http://tipranks.com/top-experts?ref=notifications-window">Start &gt;</a>
                                            </p>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </div>
                        <div class="client-components-header-header__authMenu">
                            <div class="tr-auth-menu  open ">
                                <div style="display: flex; align-items: center; width: auto;">
                                    <div class="main-button">
                                        <button>Login</button> / <button>Sign Up</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="client-components-header-header__subMenuWrapper">
            <div class="client-components-header-header__subMenu">
                <nav class="client-components-header-header-sub-menu__nav">
                    <div class="client-components-header-header-sub-menu__row">
                        <ul class="client-components-header-header-sub-menu__navList">
                            <li class="client-components-header-header-sub-menu__li">
                                <div class="client-components-header-header-sub-menu__item">
                                    <a href="http://tipranks.com/analysts/top" class="client-components-header-header-sub-menu__text active">Top 25 Analysts</a>
                                </div>
                            </li>
                            <li class="client-components-header-header-sub-menu__li">
                                <div class="client-components-header-header-sub-menu__item">
                                    <a href="http://tipranks.com/stocks/top-rated" class="client-components-header-header-sub-menu__text">Analysts' Top Stocks</a>
                                </div>
                            </li>
                            <li class="client-components-header-header-sub-menu__li">
                                <div class="client-components-header-header-sub-menu__item">
                                    <a href="http://tipranks.com/insiders/hot-stocks" class="client-components-header-header-sub-menu__text">Insiders' Hot Stocks</a>
                                </div>
                            </li>
                            <li class="client-components-header-header-sub-menu__li">
                                <div class="client-components-header-header-sub-menu__item">
                                    <a href="http://tipranks.com/ratings" class="client-components-header-header-sub-menu__text">Daily Analyst Ratings</a>
                                </div>
                            </li>
                            <li class="client-components-header-header-sub-menu__li">
                                <div class="client-components-header-header-sub-menu__item">
                                    <a href="http://tipranks.com/plans?llf=sub-header-plans-page-link" class="client-components-header-header-sub-menu__text">Plans &amp; Pricing</a>
                                </div>
                            </li>
                            <li class="client-components-header-header-sub-menu__li">
                                <div class="client-components-header-header-sub-menu__item">
                                    <a href="http://tipranks.com/about" class="client-components-header-header-sub-menu__text">About Us</a>
                                </div>
                            </li>
                        </ul>
                        <div class="header-tickers-wrapper">
                            <ul class="header-tickers">
                                <li>
                                    <a href="http://tipranks.com/stocks/aapl">AAPL</a>
                                </li>
                                <li>
                                    <a href="http://tipranks.com/stocks/fb">FB</a>
                                </li>
                                <li>
                                    <a href="http://tipranks.com/stocks/amzn">AMZN</a>
                                </li>
                                <li>
                                    <a href="http://tipranks.com/stocks/nvda">NVDA</a>
                                </li>
                                <li>
                                    <a href="http://tipranks.com/stocks/baba">BABA</a>
                                </li>
                                <li>
                                    <a href="http://tipranks.com/stocks/tsla">TSLA</a>
                                </li>
                                <li>
                                    <a href="http://tipranks.com/stocks/mu">MU</a>
                                </li>
                                <li>
                                    <a href="http://tipranks.com/stocks/amd">AMD</a></li>
                                <li>
                                    <a href="http://tipranks.com/stocks/bac">BAC</a></li>
                                <li>
                                    <a href="http://tipranks.com/stocks/wfc">WFC</a>
                                </li>
                                <li>
                                    <a href="http://tipranks.com/stocks/fcx">FCX</a>
                                </li>
                                <li>
                                    <a href="http://tipranks.com/stocks/f">F</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div>

        </div>
        <div class="client-components-notification-bar-notification-bar__notificationBar client-components-notification-bar-notification-bar__timed" style="animation-duration: 7000ms; background-color: rgb(0, 125, 214);">
            <span class="client-components-notification-bar-notification-bar__text"></span>
        </div>
    </header>

    <?php
}


function run_autocomplete_js() {
    wp_enqueue_script('autocomplete', get_stylesheet_directory_uri(). '/js/autocomplete.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'run_autocomplete_js');