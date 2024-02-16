<template>
  <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 shadow-lg">
      <thead>
      <tr>
        <th class="py-3 px-6 bg-gray-700 text-white">Order ID</th>
        <th class="py-3 px-6 bg-gray-700 text-white">Quantity</th>
        <th class="py-3 px-6 bg-gray-700 text-white">Total</th>
        <th class="py-3 px-6 bg-gray-700 text-white">Create Date</th>
        <th class="py-3 px-6 bg-gray-700 text-white">Delivery Date</th>
        <th class="py-3 px-6 bg-gray-700 text-white">Status</th>
      </tr>
      </thead>
      <tbody>
      <tr class="hover:bg-gray-100 border-b" v-for="order in orders">
        <td class="py-2 px-6 text-center">{{ order.id }}</td>
        <td class="py-2 px-6 text-center">{{order.volume}} L</td>
        <td class="py-2 px-6 text-center">${{order.total}}</td>
        <td class="py-2 px-6 text-center">{{ formatDateTime(order.created_at) }}</td>
        <td class="py-2 px-6 text-center">{{ formatDateTime(order.delivery_date) }}</td>
        <td class="py-2 px-6 text-center">{{order.status}}</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
export default {
  props: {
    orders: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
    };
  },

  mounted() {
  },
  methods: {
    formatDateTime(dateTimeString) {
      const options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric'};
      return new Date(dateTimeString).toLocaleDateString('en-US', options);
    },
  },
};
</script>