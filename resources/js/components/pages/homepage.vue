<template>
  <section>
    <div class="center grid">
      <vs-row>
        <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
          <b-image
            cover-image
            src="https://ministryoffood.co.nz/wp-content/uploads/2020/03/462773.jpg"
          >
            <template #placeholder>
              <b-skeleton
                class="skeleton-placeholder"
                height="100%"
              ></b-skeleton>
            </template>
          </b-image>
        </vs-col>
      </vs-row>
    </div>
  </section>
</template>