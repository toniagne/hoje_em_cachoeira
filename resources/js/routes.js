export default [
    { path: '/sales/trades', component: require('./components/trade/TradeComponent/TradeComponent').default },
    { path: '*', component: require('./components/NotFound.vue').default }
];
