
// jQuery(function ($) {
//   $('.accordion').on('click', function () {
//     $(this).next().slideToggle(200);
//     // 矢印向き変更
//     $(this).toggleClass('open', 200);
//   });
// });
// .next().hide();

jQuery(function ($) {
  // アコーディオンメニュー隠す
  // $('.accordion').hide();
  // accordion-titleをクリックすると
  $('.accordion-title').on('click', function () {
    // その次のacoordionが開く
    $(this).next().slideToggle(200);
    // 矢印向き変更
    $(this).toggleClass('open', 200);
  });
});