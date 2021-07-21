<template>
  <div>
    <section id="hero">
      <div class="hero-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="hero-main-content">
                <h2 id="hero_title">Find Awesome Deals in Bangladesh</h2>
                <p id="hero_des">
                  Lists of top restaurants, cafes, pubs and bars in Melbourne,
                  based on trends
                </p>
                <div class="food-search-bar">
                  <form
                    action="https://food.amcoders.xyz/resturents"
                    id="searchform"
                  >
                    <div class="search-input">
                      <div class="row w-100">
                        <div class="col-lg-9 pr-0">
                          <input
                            type="hidden"
                            id="lat"
                            name="lat"
                            required=""
                            value=""
                          />
                          <input
                            type="hidden"
                            id="long"
                            name="long"
                            required=""
                            value=""
                          />
                          <input
                            type="hidden"
                            id="city"
                            name="city"
                            required=""
                            value=""
                          />
                          <div class="slider-search-content-area">
                            <input
                              type="text"
                              placeholder="Enter your delivery location"
                              id="location_input"
                              name="address"
                              required=""
                              class="pac-target-input"
                              autocomplete="off"
                            />
                            <div class="location-icon" id="locationIcon">
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                id="ic-locate-me-round"
                                width="24"
                                height="24"
                              >
                                <defs>
                                  <path
                                    id="a"
                                    d="M11.5 18a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM12 4v2.019A6.501 6.501 0 0 1 17.981 12H20v1h-2.019a6.501 6.501 0 0 1-5.98 5.981L12 21h-1v-2.019a6.501 6.501 0 0 1-5.981-5.98L3 13v-1h2.019A6.501 6.501 0 0 1 11 6.02V4h1zm-.5 11a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm0 1a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7zm0-2.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                                  ></path>
                                </defs>
                                <use fill="#ff3252" xlink:href="#a"></use>
                              </svg>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 pr-0">
                          <button type="submit" id="button_title">
                            Search
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <homepage-slider></homepage-slider>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>