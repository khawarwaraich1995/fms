<template>
    <div class="center grid">
      <vs-row>
      <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
        100%
      </vs-col>
    </vs-row>

    <vs-row>
      <vs-col :key="index" v-for="col,index in 2" vs-type="flex" vs-justify="center" vs-align="center" w="6">
        50%
      </vs-col>
    </vs-row>

    <vs-row>
      <vs-col :key="index" v-for="col,index in 3" vs-type="flex" vs-justify="center" vs-align="center" w="4">
        33.3%
      </vs-col>
    </vs-row>

    <vs-row>
      <vs-col :key="index" v-for="col,index in 4" vs-type="flex" vs-justify="center" vs-align="center" w="3">
        25%
      </vs-col>
    </vs-row>

    <vs-row>
      <vs-col :key="index" v-for="col,index in 6" vs-type="flex" vs-justify="center" vs-align="center" w="2">
        16.6%
      </vs-col>
    </vs-row>

    <vs-row>
      <vs-col :key="index" v-for="col,index in 12" vs-type="flex" vs-justify="center" vs-align="center" w="1">
        8.3%
      </vs-col>
    </vs-row>
    </div>
  </template>