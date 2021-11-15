<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $categories = array(
         array(
            'id' => 1,
            'title' => 'Soft skills',
            'icon' => '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 47 47" style="enable-background:new 0 0 47 47;" xml:space="preserve"><g><g><path d="M45.707,0.248c-0.217-0.19-0.504-0.277-0.792-0.239l-20.096,2.69c-0.497,0.066-0.867,0.49-0.867,0.991v17.592 c0,0.552,0.448,1,1,1h20.096c0.552,0,1-0.448,1-1V1C46.048,0.711,45.924,0.437,45.707,0.248z M44.048,20.282H25.952V4.565 l18.096-2.422V20.282z"/><path d="M20.952,24.336c0,0-0.001,0-0.002,0L2.046,24.375c-0.552,0.001-0.998,0.449-0.998,1v15.001 c0,0.503,0.374,0.928,0.873,0.992l18.904,2.406c0.043,0.005,0.085,0.008,0.127,0.008c0.242,0,0.478-0.088,0.661-0.25 c0.215-0.19,0.339-0.463,0.339-0.75V25.336c0-0.266-0.105-0.52-0.294-0.708C21.471,24.441,21.216,24.336,20.952,24.336z M19.952,41.647L3.048,39.495V26.373l16.904-0.035V41.647z"/><path d="M20.824,3.187l-19,2.445C1.325,5.697,0.952,6.122,0.952,6.624v14.658c0,0.552,0.448,1,1,1h19c0.552,0,1-0.448,1-1V4.179 c0-0.288-0.124-0.561-0.339-0.751S21.108,3.15,20.824,3.187z M19.952,20.282h-17V7.504l17-2.188V20.282z"/><path d="M45.05,24.375l-20.096-0.028c0,0-0.001,0-0.001,0c-0.265,0-0.519,0.105-0.706,0.292c-0.188,0.188-0.293,0.442-0.293,0.708 v17.935c0,0.5,0.37,0.924,0.866,0.991l20.096,2.718C44.959,46.997,45.004,47,45.048,47c0.241,0,0.475-0.087,0.658-0.247 c0.217-0.19,0.342-0.464,0.342-0.753V25.375C46.048,24.823,45.601,24.376,45.05,24.375z M44.048,44.855l-18.096-2.447v-16.06 l18.096,0.025V44.855z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>',
         ),
         array(
            'id' => 2,
            'title' => 'Hard skills',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M343.124 102.271c-23.561 12.958-54.501 20.094-87.124 20.094s-63.564-7.136-87.124-20.094c-4.478-2.464-8.612-5.097-12.407-7.878v16.973c0 23.341 40.876 49.348 99.531 49.348s99.531-26.007 99.531-49.348V94.393a113.286 113.286 0 01-12.407 7.878zM326.194 15.746C308 5.739 282.416 0 256 0s-52.001 5.739-70.194 15.746c-14.924 8.208-23.482 18.366-23.482 27.872s8.559 19.664 23.482 27.872C204 81.496 229.584 87.236 256 87.236s52-5.739 70.194-15.746c14.923-8.208 23.482-18.368 23.482-27.872s-8.559-19.664-23.482-27.872zM202.609 371.591c-23.56 12.958-54.501 20.094-87.124 20.094s-63.564-7.136-87.124-20.094c-4.478-2.464-8.612-5.097-12.407-7.878v16.972c0 23.341 40.876 49.348 99.531 49.348 58.656 0 99.531-26.007 99.531-49.348v-16.972c-3.795 2.781-7.929 5.414-12.407 7.878zM483.638 371.591c-23.561 12.958-54.501 20.094-87.124 20.094s-63.563-7.136-87.124-20.094c-4.478-2.463-8.612-5.097-12.407-7.878v16.972c0 23.341 40.876 49.348 99.531 49.348s99.531-26.007 99.531-49.348v-16.972c-3.794 2.781-7.928 5.415-12.407 7.878zM466.707 285.065c-18.193-10.007-43.777-15.746-70.193-15.746-8.85 0-17.598.659-26.015 1.891l-30.994-53.681c10.277-7.989 16.026-17.117 16.026-25.869v-22.843c-24.446 16.702-59.71 27.024-99.531 27.024s-75.086-10.322-99.531-27.024v22.843c0 8.753 5.747 17.879 16.025 25.869L141.5 271.211a180.044 180.044 0 00-26.015-1.891c-26.416 0-52.001 5.739-70.194 15.746-14.924 8.208-23.482 18.368-23.482 27.872s8.559 19.664 23.482 27.872c18.194 10.006 43.778 15.746 70.194 15.746s52.001-5.739 70.194-15.746c14.924-8.208 23.482-18.368 23.482-27.872s-8.559-19.664-23.482-27.872c-2.851-1.568-5.903-3.019-9.091-4.371l27.348-47.37c14.787 4.756 32.421 7.683 52.063 7.683s37.276-2.926 52.064-7.683l27.349 47.37c-3.19 1.352-6.241 2.803-9.092 4.371-14.923 8.208-23.482 18.368-23.482 27.872s8.56 19.664 23.482 27.872c18.194 10.006 43.78 15.746 70.194 15.746s52-5.739 70.194-15.746c14.923-8.208 23.482-18.368 23.482-27.872s-8.56-19.664-23.483-27.873zM396.515 465.162c-39.741 0-74.943-10.282-99.384-26.925l-.001-.007h-.009a5.523 5.523 0 01-.137-.093v.093h-81.967v-.093c-24.445 16.703-59.711 27.024-99.531 27.024S40.4 454.839 15.955 438.137v24.515c0 23.341 40.876 49.348 99.531 49.348 49.757 0 86.706-18.715 96.776-38.642h87.479C309.809 493.285 346.757 512 396.515 512c58.655 0 99.531-26.007 99.531-49.348v-24.515c-24.446 16.703-59.711 27.025-99.531 27.025z"/></svg>',
         ),
         array(
            'id' => 3,
            'title' => 'Маркетинг',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M276.211.792v163.086c19.389 4.236 36.553 14.415 49.463 28.559l141.237-81.543C424.329 49.121 355.325 6.971 276.211.792zM487.159 145.878L345.9 227.434A94.26 94.26 0 01350.315 256c0 45.15-31.733 82.869-74.108 92.122v163.085C408.145 500.904 512 390.583 512 256c0-39.427-8.921-76.766-24.841-110.122zM235.789 163.878V.792C103.854 11.097 0 121.418 0 256c0 134.581 103.852 244.902 235.787 255.208V348.121c-42.372-9.255-74.103-46.972-74.103-92.121 0-45.15 31.732-82.867 74.105-92.122z"/></svg>',
         ),
         array(
            'id' => 4,
            'title' => 'Менеджмент',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 297 297"><path d="M112.632 185.074l6.88-3.972a5.864 5.864 0 002.146-8.01l-13.036-22.579a5.861 5.861 0 00-8.009-2.146l-6.88 3.972a5.822 5.822 0 01-2.923.794c-3.063 0-5.872-2.449-5.872-5.872v-7.944a5.864 5.864 0 00-5.864-5.864H53.001a5.864 5.864 0 00-5.864 5.864v7.944c0 3.423-2.81 5.872-5.872 5.872a5.822 5.822 0 01-2.923-.794l-6.88-3.972a5.86 5.86 0 00-8.009 2.146l-13.036 22.579a5.864 5.864 0 002.146 8.01l6.88 3.972c3.909 2.257 3.909 7.899 0 10.156l-6.88 3.972a5.863 5.863 0 00-2.146 8.01l13.036 22.579a5.861 5.861 0 008.009 2.146l6.88-3.972a5.822 5.822 0 012.923-.794c3.063 0 5.872 2.449 5.872 5.872v7.944a5.864 5.864 0 005.864 5.864h26.072a5.864 5.864 0 005.864-5.864v-7.944c0-3.423 2.81-5.872 5.872-5.872.976 0 1.978.249 2.923.794l6.88 3.972a5.86 5.86 0 008.009-2.146l13.036-22.579a5.864 5.864 0 00-2.146-8.01l-6.88-3.972c-3.908-2.257-3.908-7.9.001-10.156zm-46.594 22.474c-9.608 0-17.396-7.789-17.396-17.396 0-9.608 7.789-17.396 17.396-17.396s17.396 7.789 17.396 17.396c0 9.607-7.789 17.396-17.396 17.396zM108.109 23.659A8.053 8.053 0 1096.72 35.048l14.39 14.389c-52.889 2.619-95.701 44.162-100.334 96.506l1.19-2.062a19.183 19.183 0 0116.57-9.564c.144 0 .287.013.431.017 9.074-37.721 41.965-66.251 81.815-68.729L96.72 79.666a8.053 8.053 0 0011.388 11.389l28.004-28.004a8.055 8.055 0 000-11.388l-28.003-28.004zM209.868 64.857c17.881 0 32.428-14.547 32.428-32.428C242.296 14.547 227.749 0 209.868 0c-17.881 0-32.428 14.547-32.428 32.428 0 17.881 14.547 32.429 32.428 32.429zM273.039 152.276v-44.58c0-12.34-7.93-23.283-19.657-27.124l-.054-.018-17.152-2.84a2.875 2.875 0 00-3.545 1.764l-19.462 53.399c-1.123 3.081-5.48 3.081-6.602 0l-19.462-53.399a2.875 2.875 0 00-2.698-1.892c-.279 0-17.999 2.964-17.999 2.964-11.823 3.94-19.723 14.9-19.723 27.294v44.432c0 6.659 5.398 12.056 12.056 12.056h102.241c6.66 0 12.057-5.398 12.057-12.056zM287.37 162.933c-.673 9.215-8.233 14.858-17.45 15.526-7.062 40.425-41.207 71.64-82.979 74.237l14.061-14.061a8.053 8.053 0 10-11.389-11.389L161.61 255.25a8.053 8.053 0 000 11.389l28.003 28.003c1.573 1.572 3.633 2.358 5.694 2.358s4.122-.786 5.694-2.358a8.053 8.053 0 000-11.389l-14.389-14.389c56.028-2.774 100.758-49.227 100.758-105.931z"/><path d="M216.936 77.105c-.747-.814-1.84-1.224-2.946-1.224h-8.245c-1.105 0-2.198.41-2.946 1.224a3.825 3.825 0 00-.504 4.505l4.407 6.644-2.063 17.405 4.063 10.808c.396 1.087 1.933 1.087 2.33 0l4.063-10.808-2.063-17.405 4.407-6.644a3.823 3.823 0 00-.503-4.505z"/></svg>',
         ),
         array(
            'id' => 5,
            'title' => 'Финансы',
            'icon' => '<svg width="50px" height="50px" viewBox="0 0 50 50" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" overflow="inherit"><path d="M43 12h-43v26h50v-26h-7zm5 19.271c-2.328.643-4.086 2.399-4.729 4.729h-36.542c-.644-2.328-2.4-4.086-4.729-4.729v-12.542c2.329-.644 4.085-2.4 4.729-4.729h36.565c.672 2.257 2.449 4.034 4.706 4.706v12.565zm-20.884-4.216c-.23-.14-.116-.269-1.116-.388v2.897l.548-.102c.742-.26 1.114-.745 1.114-1.451 0-.409-.183-.731-.546-.956zm-4.501-4.727c0 .445.203.78.607 1 .155.087.416.184.777.289v-2.741c-.294.069-.552.173-.769.315-.41.272-.615.652-.615 1.137zm2.385-7.328c-4.971 0-9 4.478-9 10 0 5.521 4.029 10 9 10s9-4.479 9-10c0-5.522-4.029-10-9-10zm3.854 15.654c-.679.58-1.854.935-2.854 1.069v1.277h-2v-1.3c-1.044-.142-1.909-.3-2.588-.835-.942-.742-1.412-1.865-1.412-2.865h2.488c.081 0 .239.801.475 1.084.245.291.593.325 1.037.448v-3.405c-1.217-.281-2.065-.584-2.536-.91-.841-.575-1.261-1.476-1.261-2.7 0-1.117.411-2.045 1.234-2.784.628-.565 1.484-.912 2.563-1.046v-1.687h2v1.74c1 .149 1.676.613 2.3 1.076.939.697 1.6 1.184 1.645 3.184h-2.506c-.047-1-.549-1.432-1.172-1.748-.033-.016-.267-.193-.267-.207v3.143l.902.174c.959.226 1.846.528 2.324.905.744.588 1.032 1.437 1.032 2.547.002 1.14-.524 2.086-1.404 2.84z"/></svg>',
         ),
         array(
            'id' => 6,
            'title' => 'Staff менеджмент',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="44.75" height="44.75"><path d="M33.285 19.991c-.003-.039-.004-.078-.008-.116-.033-1.48-.291-2.676-1.455-3.169-1.23-.521-2.314-.528-3.109-.219-.052.021-.188.2-.24.233-.053.033-.332-.06-.437-.035-1.745.249-2.321 1.893-2.194 3.175.417.728.549 1.646.588 2.595.65 1.134 1.766 2.005 3.098 2.005 1.779 0 3.188-1.502 3.627-3.137a.353.353 0 00.32-.32l.055-.646a.355.355 0 00-.245-.366zm-3.76 3.969c-1.836 0-3.209-1.945-3.209-3.686 0-.082.007-.162.013-.242.765-.28 2.235-.865 2.396-1.173.668.694 3.028 1.084 4.065 1.215.005.066.011.133.011.2-.002 1.705-1.432 3.686-3.276 3.686zM9.641 20.342l.055.646a.358.358 0 00.344.323c.429 1.639 1.814 3.148 3.569 3.148 1.377 0 2.525-.902 3.181-2.065-.014-.813.2-1.648.664-2.339-.029-.021-.05-.052-.085-.064-.003-.039-.004-.078-.008-.116-.033-1.48-.291-2.676-1.455-3.169-1.23-.521-2.314-.528-3.109-.219-.052.021-.187.2-.24.233-.053.033-.332-.06-.437-.035-1.745.249-2.321 1.894-2.194 3.176l-.009.108a.354.354 0 00-.276.373zm.77-.309c.765-.28 2.235-.865 2.395-1.173.668.694 3.029 1.084 4.066 1.215.005.066.011.133.011.2 0 1.704-1.43 3.686-3.273 3.686-1.837 0-3.209-1.945-3.209-3.686a2.398 2.398 0 01.01-.242zM19.021 8.686c.261.997 1.103 1.915 2.171 1.915 1.083 0 1.938-.914 2.207-1.908a.215.215 0 00.195-.195l.033-.393a.217.217 0 00-.148-.223l-.004-.07c-.021-.9-.178-1.627-.886-1.928-.749-.317-1.408-.322-1.892-.133-.032.013-.114.122-.146.142-.032.02-.202-.036-.266-.021-1.061.151-1.411 1.151-1.334 1.932-.003.021-.004.044-.006.066a.216.216 0 00-.167.227l.034.393a.216.216 0 00.209.196zm.226-.778c.465-.17 1.359-.526 1.457-.714.406.422 1.842.66 2.473.739.003.041.007.081.007.122 0 1.036-.871 2.241-1.992 2.241-1.118 0-1.952-1.183-1.952-2.241 0-.05.003-.098.007-.147zM14.169 8.614c-1.474.21-1.96 1.599-1.853 2.683l-.008.091a.298.298 0 00-.231.315l.047.546a.3.3 0 00.29.272c.363 1.384 1.532 2.659 3.015 2.659 1.503 0 2.692-1.269 3.064-2.649a.302.302 0 00.271-.271l.046-.545a.302.302 0 00-.206-.31c-.003-.032-.003-.065-.007-.098-.028-1.25-.246-2.26-1.229-2.677-1.039-.44-1.955-.446-2.626-.185-.044.018-.158.169-.203.197-.045.028-.28-.05-.37-.028zm.581 1.837c.564.586 2.558.916 3.434 1.026.004.056.009.112.009.169 0 1.439-1.208 3.112-2.765 3.112-1.552 0-2.71-1.643-2.71-3.112 0-.069.005-.137.01-.204.646-.236 1.887-.732 2.022-.991zM23.964 12.521c.363 1.384 1.532 2.659 3.015 2.659 1.504 0 2.692-1.269 3.064-2.649.098-.011.168-.075.216-.156l.074-.008c.017-.002.047-.013.05-.043l.047-.544c.002-.037-.035-.051-.039-.052l-.031-.011a.302.302 0 00-.207-.31c-.002-.032-.002-.065-.006-.098-.028-1.25-.246-2.26-1.229-2.677-1.039-.44-1.955-.446-2.626-.185-.044.018-.158.169-.203.197-.044.027-.279-.05-.369-.029-1.474.21-1.96 1.599-1.853 2.683-.003.03-.005.061-.009.091a.297.297 0 00-.23.315l.047.546a.299.299 0 00.289.271zm.313-1.08c.646-.236 1.888-.731 2.022-.991.563.586 2.558.916 3.435 1.026.004.056.009.112.009.169 0 1.439-1.208 3.112-2.765 3.112-1.553 0-2.711-1.643-2.711-3.112l.01-.204z"/><path d="M18.695 12.731a4.25 4.25 0 01-.907 1.572l3.395.002v-.006l3.467-.002a4.277 4.277 0 01-.887-1.567.543.543 0 01-.338-.459l-.047-.546a.544.544 0 01.236-.498c-.018-.192-.01-.39.011-.588-.202-.208-.438-.355-.723-.396a.28.28 0 00-.147.019l-.894 1.209-.679-.541-.004.003v.003l-.001-.001-.677.542-.894-1.209a.29.29 0 00-.146-.018 1.22 1.22 0 00-.66.335 8.4 8.4 0 01.046.671.548.548 0 01.213.481l-.046.544a.544.544 0 01-.318.45zM33.085 21.764zM12.402 16.458l.054.01.022-.025c.089-.098.147-.159.226-.19.45-.175.959-.242 1.5-.212l-.978-1.323a.402.402 0 00-.203-.025c-.917.129-1.495 1.018-1.862 2.051.271-.142.569-.257.922-.308l.081-.007c.066.002.155.015.238.029zM16.695 23.382l.068.795a.438.438 0 00.423.398c.528 2.016 2.232 3.875 4.392 3.875 2.191 0 3.923-1.85 4.464-3.861a.44.44 0 00.396-.395l.067-.794a.434.434 0 00-.301-.45c-.004-.047-.005-.096-.011-.143-.039-1.821-.356-3.293-1.791-3.9-1.513-.641-2.847-.65-3.825-.27-.064.025-.23.246-.295.287-.065.04-.408-.073-.538-.042-2.147.306-2.856 2.33-2.7 3.908l-.011.133a.435.435 0 00-.338.459zm.948-.381c.94-.344 2.75-1.064 2.946-1.443.823.854 3.728 1.334 5.003 1.494.006.082.014.164.014.246 0 2.098-1.76 4.535-4.028 4.535-2.261 0-3.949-2.394-3.949-4.535-.001-.1.007-.198.014-.297z"/><path d="M16.359 16.39l-.942-.751-.006.005v.005l-.001-.001-.604.481a5.67 5.67 0 011.196.348c1.344.569 1.57 1.998 1.605 3.335.476-.594 1.158-1.043 2.1-1.178l.091-.008c.079 0 .185.017.284.035l.051.009c-.245-1.585-.849-3.776-2.331-3.985a.393.393 0 00-.204.026l-1.239 1.679zM29.354 14.685a.389.389 0 00-.203.026l-1.241 1.68-.942-.751-.006.005v.005l-.001-.001-.942.751-1.242-1.68a.396.396 0 00-.202-.025c-1.321.186-1.946 1.949-2.239 3.453a6.632 6.632 0 012.166.53c.463.196.812.474 1.083.808-.009-1.34.704-2.802 2.417-3.047l.081-.007c.065 0 .155.014.239.029l.054.01.022-.025c.088-.098.146-.159.226-.19.683-.266 1.503-.29 2.364-.083-.369-.778-.89-1.383-1.634-1.488zM21.559 35.933l7.115-.006s-.217-7.719-3.635-8.2a.567.567 0 00-.296.037l-1.809 2.446-1.373-1.094-.008.006v.008l-.002-.002-1.373 1.095-1.809-2.448a.59.59 0 00-.296-.037c-3.418.48-3.635 8.201-3.635 8.201l7.12.004.001-.01z"/><path d="M29.51 30.542l5.782-.004s-.176-6.273-2.954-6.666a.47.47 0 00-.24.03l-1.471 1.989L29.512 25l-.007.006v.007l-.001-.002-1.115.89-1.47-1.988a.508.508 0 00-.205-.025l-.028.328a.673.673 0 01-.441.58c-.352 1.178-1.133 2.338-2.197 3.086a18.73 18.73 0 00-.098.535l.635-.858.064-.026a.857.857 0 01.429-.053c1.424.201 2.317 1.527 2.883 3.07l1.55.002v-.01zM7.807 30.548l5.786.002v-.01h1.567c.567-1.535 1.459-2.851 2.878-3.049a.917.917 0 01.423.051l.066.026.622.841a14.58 14.58 0 00-.114-.617c-.989-.75-1.717-1.865-2.05-3.002a.68.68 0 01-.472-.592l-.026-.308c-.023-.004-.042-.015-.066-.019a.476.476 0 00-.241.029l-1.47 1.989-1.115-.89-.007.006v.006l-.001-.002-1.115.89-1.47-1.989a.499.499 0 00-.241-.029c-2.778.392-2.954 6.667-2.954 6.667z"/><path d="M37.445 4.883L40.027.985l-9.471 1.197 2.92 8.694 2.287-3.452c3.682 3.526 5.986 8.475 5.986 13.964 0 10.685-8.691 19.375-19.375 19.375C11.691 40.764 3 32.073 3 21.389 3 13.463 7.787 6.645 14.617 3.646L12.36 1.39C5.039 5.072 0 12.65 0 21.39c0 12.337 10.038 22.375 22.375 22.375S44.75 33.727 44.75 21.39c0-6.535-2.823-12.412-7.305-16.507z"/></svg>',
         ),
         array(
            'id' => 7,
            'title' => 'Продажи и переговоры',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 76.808 76.808"><path d="M75.923 72.659c-1.101-8.435-.306-16.899-.319-25.387-.012-6.64-4.892-9.908-11.111-10.543-2.117-.218-4.254-.314-6.402-.343a1.992 1.992 0 00-.243-.314c-1.734-1.836-2.769-3.976-4.25-5.995-1.665-2.266-3.45-4.393-4.949-6.781-1.472-2.348-3.071-4.619-4.596-6.932-1.058-1.604-2.493-2.863-3.676-4.341 1.862-.832 3.251-2.489 3.211-4.873-.056-3.247-3.234-7.805-6.906-7.072-1.99.396-3 2.207-3.597 3.98-.198.586-.166 1.327-.297 1.952a2.467 2.467 0 00-.528 1.069c-.208 1.048-.56 2.141.096 3.136.621.943 1.417 1.5 2.457 1.921.154.064.316.111.476.162-3.419 2.877-6.052 7.89-8.822 10.643-2.906 2.887-5.559 6.029-8.218 9.141-1.195 1.396-2.327 2.611-3.25 4.026a3.24 3.24 0 00-1.237.564c-.182.009-.374.021-.592.044-2.354.241-3.777-1.048-6.181-.288-3.165 1.006-4.545 4.61-5.248 7.517C.65 48.452.965 53.451.877 58.04a45.703 45.703 0 00.746 9.314c.427 2.27.474 5.042 1.849 6.958 2.036 2.837 7.725 2.479 10.738 2.482 6.985.008 13.948-.563 20.965-.556 6.288.006 12.486-.885 18.764-.794 3.435.05 6.895.419 10.32.125 2.977-.255 5.441-.852 8.438-.477.55.068.983-.137 1.291-.474 1.08.059 2.114-.586 1.935-1.959zM35.824 7.931c.079-.588-.127-.138.379-.571.373-.321.769-.585 1.16-.887.881-.676.389-2.026-.762-1.807-.167.032-.33.045-.493.059.173-.46.395-.886.705-1.225 1.036-1.139 2.592 1.565 2.866 2.273.729 1.885-.06 2.916-2.007 3.097-.501.047-.901-.102-1.356-.304-.711-.313-.56-.128-.492-.635zM20.778 34.45c.157-.262.335-.509.519-.751.054.018.111.023.158.058.43-.482.855-.967 1.255-1.456a150.57 150.57 0 016.098-7.016c1.79-1.932 3.269-4.054 4.815-6.188.991-1.365 2.857-4.36 4.658-5.87.716 1.234 1.644 2.288 2.502 3.543 1.79 2.621 3.262 5.535 4.905 8.255 1.457 2.408 3.087 4.631 4.762 6.893 1.104 1.491 1.889 3.044 2.863 4.507-5.572.152-11.174.607-16.654.719-4.408.093-9.073-.403-13.679-.526-.032.032-.072.062-.108.094-.605-.164-1.211-.31-1.806-.33a14.55 14.55 0 01-1.243-.115c.293-.619.603-1.232.955-1.817zm50.019 34.623c-.75-.606-1.539-1.16-2.246-1.816-.895-.83-2.207.47-1.341 1.342.745.749 1.586 1.393 2.379 2.089.08.068.153.14.229.21a8.853 8.853 0 00-1.4.004c-.237.02-.472.051-.703.083-1.02-.435-2.066-.834-2.982-1.439-.599-.396-1.333.541-.772 1 .366.297.756.612 1.164.92-.315.065-.632.128-.948.187-.051-.045-.094-.088-.145-.131-.8-.685-1.686-1.355-2.802-1.095-.435.102-.583.823-.133 1.015.284.121.535.291.779.476-.146.003-.29.016-.438.015-1.131-.01-2.258-.034-3.385-.063-.065-.029-.123-.063-.191-.092-.982-.414-2.056-1.11-2.893-1.775-.733-.582-1.754.361-1.054 1.054.273.267.552.507.835.734-2.876-.061-5.752-.07-8.642.171-4.752.396-9.372.588-14.158.592-5 .006-10 .589-14.969.594-3.403.003-10.472 1.112-11.239-3.246-.88-5.009-1.426-9.735-1.322-14.839.07-3.529-.123-7.06.523-10.539.227-.213.418-.401.451-.467.797-1.603 1.618-2.659 2.861-3.363.979.112 2.026-.147 3.013-.138 1.169.015 2.533.146 3.657-.29 5.687-.163 11.392.605 17.067.81 8.066.287 16.182-.279 24.248-.436 3.383-.065 6.74-.203 10.061.54.164.036.317.08.473.122a.812.812 0 00.155.703c.964 1.167 2.224 1.862 3.532 2.585.161.09.328.187.496.285.248.692.391 1.445.458 2.243-.403-.339-.806-.679-1.209-1.021-.826-.704-1.892.361-1.188 1.185.753.885 1.525 1.757 2.426 2.482-.017.383-.036.768-.061 1.156-.024.415-.04.834-.063 1.251-.491-.243-1.04-.297-1.616.002-.593.306-.325 1.298.342 1.262.484-.026.921.85 1.153 1.227a151.995 151.995 0 00-.097 3.314 4.72 4.72 0 00-1.094-.694c-.902-.427-1.688.852-.792 1.357.542.306.918.638 1.22 1.187.159.287.382.589.648.848.004 1.306.022 2.611.069 3.913a15.575 15.575 0 01-1.438-1.094c-.749-.635-1.707.323-1.073 1.072.771.91 1.567 1.697 2.619 2.212.057.966.121 1.93.209 2.888-.22-.204-.44-.405-.673-.592z"/><path d="M16.548 57.061c-1.392-1.379-2.849-2.817-4.315-4.106-1.673-1.468 2.318-1.575 2.658-1.585 1.384-.037 2.679.613 3.621 1.575.842.858 1.99-.391 1.283-1.284-1.775-2.244-6.472-4.802-9.29-2.686-3.736 2.806-1.088 5.813 1.451 8.373 1.712 1.728 3.608 3.154 4.892 5.266.627 1.032-3.479 1.675-4.101 1.741-.485.054-1.103.148-1.586.04a1.587 1.587 0 00-.617-.031l-.024-.003c-.835 0-1.416.785-1.375 1.571.027.536.276 1.126.788 1.378 2.729 1.341 9.291.029 10.342-3.223.858-2.655-2.056-5.369-3.727-7.026zM37.097 66.817a547.05 547.05 0 01-3.573-13.727c-.385-1.556-1.146-5.77-3.38-5.77-2.191 0-2.854 2.993-2.98 4.662-.189 2.528-1.678 5.438-2.182 7.992-.534 2.71-1.254 5.261-1.47 8.029-.105 1.335 1.852 1.471 2.234.301.015-.043.024-.087.039-.131a.87.87 0 00.192-.77c.38-1.47.761-2.941 1.126-4.416 2.007.2 3.995.381 6.001.25.267 1.189.544 2.372.854 3.535.037.292.108.575.224.846.633 1.825 3.437 1.097 2.915-.801zm-9.393-6.329c.191-.835.376-1.671.551-2.509.557-2.676 2.372-5.109 1.349-7.537 1.339 3.18 2.133 6.597 2.884 10.015-1.587.101-3.19.01-4.784.031zM48.593 64.754c-1.761.064-3.503.303-5.26.406-1.214.073-.518-2.062-.519-3.045a478.36 478.36 0 01.088-10.911c.396-.347.499-.902-.04-1.667-.277-1.375-2.264-1.177-2.657-.017-.533.748-.46 1.297-.096 1.648-.056 2.463-.309 4.941-.461 7.396a108.197 108.197 0 00-.196 4.729c-.016.852-.393 1.876-.11 2.711 1.34 3.957 6.078 2.32 9.251 2.11 2.143-.143 2.179-3.443 0-3.36zM63.163 65.113c-1.251-.088-2.515.159-3.745.364-.844.142-1.695.247-2.543.364a1.623 1.623 0 00-.405-.795l.042.044a.794.794 0 00-.051-.118c-.149-1.431-.16-2.904-.151-4.39.777.089 1.559.137 2.324.157 1.301.034 2.75.325 3.925-.327.897-.497.897-1.887 0-2.385-1.175-.651-2.624-.361-3.925-.327-.761.021-1.543.068-2.316.156-.022-2.484-.195-4.941-1.078-7.202.538.104 1.08.188 1.639.213 1.516.069 3.033.052 4.55.063 2.165.015 2.165-3.375 0-3.359-1.517.011-3.034-.007-4.55.063-1.269.058-2.387-.333-3.638-.162-1.391-.146-1.953 2.231-.399 2.622l.35.087c-.22 5.2-.634 10.815.057 15.975.081.604.364 1.102.791 1.394.094.505.445.986.975 1.167-.006.017-.01.036-.015.055 2.62.386 5.547-.402 8.165-.705 1.864-.219 1.928-2.819-.002-2.954z"/></svg>',
         ),
         array(
            'id' => 8,
            'title' => 'Сервис',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 295.84 295.84"><path d="M90.644 34.525L60.75 61.591c-3.035 2.897-3.211 7.64-.457 10.655 1.324 1.586 3.444 2.594 5.771 2.594h35.807c4.231 0 7.547-3.218 7.547-7.449 0-4.289-3.315-7.551-7.547-7.551H85.578l15.212-13.922c5.483-4.955 8.628-12.117 8.628-19.515 0-6.659-2.412-12.951-6.771-17.62A26.258 26.258 0 0083.21.137c-6.658 0-12.91 2.402-17.578 6.76l-3.136 2.826c-3.073 2.805-3.32 7.483-.531 10.689 1.465 1.605 3.515 2.526 5.624 2.526 1.861 0 3.661-.71 5.062-1.988l3.105-2.807a11.284 11.284 0 017.454-2.83c3.219 0 6.129 1.269 8.182 3.558 1.852 2.104 2.83 4.682 2.83 7.454.001 3.265-1.235 6.098-3.578 8.2zM115.019 60.006c1.262 1.107 2.844 1.834 4.704 1.834h29.197v5.333c0 4.231 3.269 7.547 7.5 7.547s7.5-3.315 7.5-7.547v-5.726c4-.466 6.658-3.587 6.658-7.487 0-3.831-2.658-7.004-6.658-7.485V7.363c0-2.723-.916-4.265-1.585-4.973-.666-.708-1.965-1.946-4.187-2.273-2.688-.395-4.584.167-6.686 2.269-.666.788-37.684 46.902-37.684 46.902a7.72 7.72 0 00-1.597 5.741 7.527 7.527 0 002.838 4.977zM148.92 29.17v17.67h-13.318l13.318-17.67zM189.369 74.72c4.289 0 7.551-3.315 7.551-7.547V44.84h22v22.333c0 4.231 3.218 7.547 7.449 7.547 4.289 0 7.551-3.315 7.551-7.547V7.665c0-4.232-3.262-7.548-7.551-7.548-4.231 0-7.449 3.316-7.449 7.548V29.84h-22V7.665c0-4.232-3.262-7.548-7.551-7.548-4.231 0-7.449 3.316-7.449 7.548v59.508c0 4.232 3.218 7.547 7.449 7.547zM235.002 88.84H61.504c-24.951 0-45.584 20.14-45.584 45.091v.5c0 24.951 20.633 45.409 45.584 45.409h.563l-16.616 68.527c-.236.756-.531 1.479-.531 2.313v37c0 4.418 3.915 8.159 8.333 8.159h190c4.418 0 7.667-3.741 7.667-8.159v-37c0-.957-.01-1.792-.319-2.642l-16.458-68.199h.859c24.951 0 44.918-20.458 44.918-45.409v-.5c0-24.95-19.967-45.09-44.918-45.09zm-171.587 154l25.174-105h118.859l25.567 105h-169.6z"/><circle cx="119.599" cy="156.168" r="9.091"/><circle cx="148.008" cy="156.168" r="9.091"/><circle cx="176.416" cy="156.168" r="9.091"/><circle cx="119.599" cy="184.576" r="9.091"/><circle cx="148.008" cy="184.576" r="9.091"/><circle cx="176.416" cy="184.576" r="9.091"/><path d="M119.599 203.895a9.088 9.088 0 00-9.091 9.091 9.09 9.09 0 009.091 9.09 9.09 9.09 0 009.09-9.09 9.089 9.089 0 00-9.09-9.091zM148.008 203.895a9.089 9.089 0 00-9.091 9.091c0 5.02 4.069 9.09 9.091 9.09s9.09-4.07 9.09-9.09a9.088 9.088 0 00-9.09-9.091zM176.416 203.895a9.089 9.089 0 00-9.091 9.091c0 5.02 4.069 9.09 9.091 9.09s9.092-4.07 9.092-9.09a9.09 9.09 0 00-9.092-9.091z"/></svg>',
         ),
         array(
            'id' => 9,
            'title' => 'ИТ',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 490"><path d="M245 490c135.31 0 245-109.69 245-245S380.31 0 245 0 0 109.69 0 245s109.69 245 245 245zm15.313-159.64c24.066 1.997 44.484 8.513 61.597 17.208-18.697 40.233-44.076 72.288-61.597 91.678V330.36zm0-30.718v-39.329h85.548c-1.647 20.602-6.156 40.271-12.436 58.675-20.381-10.014-44.622-17.355-73.112-19.346zm0-69.954v-39.322c28.8-2.013 53.264-9.489 73.781-19.669 6.273 18.434 10.648 38.199 11.999 58.99h-85.78zm0-70.04V52.256c18.117 19.275 43.614 50.522 62.189 89.882-17.234 8.847-37.846 15.49-62.189 17.51zm-30.626.046c-24.285-1.955-44.933-8.553-62.271-17.38 18.582-39.443 44.127-70.754 62.271-90.057v107.437zm0 30.704v39.289h-85.78c1.347-20.729 5.7-40.438 11.943-58.825 20.615 10.159 45.107 17.587 73.837 19.536zm0 69.915v39.296c-28.423 1.928-52.695 9.219-73.171 19.209-6.249-18.355-10.734-37.967-12.376-58.506h85.547zm0 70v108.932c-17.546-19.419-42.976-51.539-61.681-91.856 17.217-8.675 37.673-15.143 61.681-17.076zm-27.099 124.841c-37.843-7.625-72.103-25.251-99.909-49.987 7.935-11.571 20.681-27.192 38.987-41.225 18.597 39.088 42.628 70.492 60.922 91.212zm145.597-90.904c18.398 14.281 30.947 30.111 38.513 41.469-27.695 24.446-61.725 41.866-99.286 49.434 18.246-20.665 42.197-51.959 60.773-90.903zm12.216-29.131c8.354-23.047 14.333-48.14 16.168-74.807h82.253c-3.317 46.767-21.702 89.431-50.316 123.165-10.225-14.324-25.955-32.525-48.105-48.358zm16.389-105.431c-1.496-26.942-7.357-52.173-15.748-75.266 21.811-15.725 37.34-33.711 47.466-47.897 28.613 33.734 46.998 76.396 50.315 123.162H376.79zm-28.079-104.345c-18.958-39.105-43.767-70.255-62.759-90.777 38.137 7.408 72.693 24.953 100.745 49.714-7.497 11.257-19.881 26.892-37.986 41.063zm-207.571.31c-18.022-13.928-30.601-29.36-38.459-40.821 28.162-25.052 62.947-42.803 101.366-50.265-19.041 20.575-43.93 51.836-62.907 91.086zm-12.289 29.055c-8.335 23.014-14.151 48.149-15.642 74.98H31.178c3.297-46.493 21.487-88.931 49.815-122.571 10.425 14.276 26.113 32.07 47.858 47.591zm-15.42 105.605c1.827 26.558 7.766 51.555 16.066 74.525-22.081 15.625-37.979 33.627-48.507 48.044-28.326-33.64-46.515-76.077-49.813-122.569h82.254z"/></svg>',
         ),
         array(
            'id' => 10,
            'title' => 'Художественная литература',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999"><path d="M486.989 450.483h-14.26v-47.706h14.259a8.912 8.912 0 008.913-8.913v-43.69c0-4.233-2.953-7.77-6.911-8.679a35.084 35.084 0 004.782-17.71v-64.996c0-19.463-15.84-35.297-35.309-35.297h-40.832a8.913 8.913 0 000 17.826h40.832c9.64 0 17.482 7.837 17.482 17.47v64.996c0 9.602-7.781 17.413-17.368 17.476H278.786a35.082 35.082 0 004.646-17.474V258.79a35.064 35.064 0 00-4.649-17.474H387.92a8.913 8.913 0 000-17.826h-58.95c19.218-17.36 30.782-42.393 30.782-68.94 0-30.934-15.16-59.961-37.721-72.228-14.907-8.104-31.754-8.444-48.438-1.223-1.023-4.292-2.455-9.226-4.425-14.154h7.638c23.701 0 42.985-19.284 42.985-42.985V8.913A8.912 8.912 0 00310.878 0H295.83c-23.701 0-42.985 19.284-42.985 42.985v1.455c-4.135-2.733-8.982-4.394-14.664-4.394a8.913 8.913 0 000 17.826c7.334 0 12.81 10.337 16.206 20.95-14.669-4.73-29.269-3.622-42.368 3.5-22.563 12.267-37.721 41.294-37.721 72.228 0 26.548 11.565 51.582 30.784 68.942H39.562a8.913 8.913 0 00-8.913 8.913v35.654a8.913 8.913 0 008.913 8.913h10.696v28.642H39.562a8.913 8.913 0 00-8.913 8.913v35.654a8.913 8.913 0 008.913 8.913h9.768c-20.194 15.627-33.233 40.079-33.233 67.534 0 22.79 8.875 44.225 24.994 60.361 16.127 16.127 37.563 25.009 60.36 25.009h385.537a8.912 8.912 0 008.913-8.913v-43.689a8.912 8.912 0 00-8.912-8.913zM270.671 42.985c0-13.873 11.286-25.158 25.158-25.158h6.135v6.135c0 13.873-11.286 25.158-25.158 25.158h-6.135v-6.135zm-78.548 111.567c0-24.211 11.682-47.471 28.41-56.568 12.495-6.792 26.893-5.334 41.645 4.22a8.913 8.913 0 009.691 0c14.752-9.554 29.151-11.012 41.646-4.22 16.727 9.095 28.41 32.357 28.41 56.568 0 28.753-16.79 55.318-42.775 67.676-3.151 1.499-61.101 1.499-64.252 0-25.986-12.357-42.775-38.923-42.775-67.676zM48.475 341.271v-17.827h82.74a8.913 8.913 0 000-17.826h-63.13v-28.642h161.867v28.642h-69.025a8.913 8.913 0 000 17.826h77.939a8.913 8.913 0 008.913-8.913v-46.468a8.913 8.913 0 00-8.913-8.913H48.475v-17.827h199.648c9.639 0 17.482 7.838 17.482 17.47v64.996c0 9.582-7.75 17.38-17.31 17.474H101.45c-.115 0-.228.008-.343.008H48.475zm429.599 152.902H291.579c-18.036 0-34.995-7.027-47.755-19.786a8.913 8.913 0 00-12.605 0 8.913 8.913 0 000 12.605 86.716 86.716 0 008.179 7.182H101.45c-18.035 0-34.995-7.027-47.752-19.783-12.753-12.766-19.777-29.728-19.777-47.759 0-37.128 30.108-67.347 67.185-67.534h138.349c-20.194 15.627-33.233 40.079-33.233 67.534 0 13.302 2.979 26.053 8.855 37.897 2.188 4.409 7.536 6.213 11.946 4.024 4.409-2.188 6.212-7.536 4.024-11.946-4.643-9.36-6.998-19.445-6.998-29.975 0-37.166 30.169-67.412 67.3-67.537h167.113c.076 0 .152-.005.228-.006h19.382v25.863H291.579c-22.974 0-41.666 18.698-41.666 41.68s18.692 41.68 41.666 41.68h186.495v25.861zM454.9 450.485H291.579c-13.145 0-23.839-10.701-23.839-23.853 0-13.153 10.694-23.853 23.839-23.853H454.9v47.706z"/></svg>',
         ),
      );

      foreach ($categories as $cat) {
         $category = new Category;
         $category->title = $cat['title'];
         $category->icon = $cat['icon'];
         $category->save();
      }
   }
}
