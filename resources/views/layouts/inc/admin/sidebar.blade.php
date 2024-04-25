 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item">
             <a class="nav-link" href="index.html">
                 <i class="mdi mdi-home menu-icon"></i>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                 aria-controls="ui-basic">
                 <i class="mdi mdi-circle-outline menu-icon"></i>
                 <span class="menu-title">UI Elements</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="ui-basic">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                     <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#categories" aria-expanded="false"
                 aria-controls="categories">
                 <i class="mdi mdi-tag menu-icon"></i>
                 <span class="menu-title">categories</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="categories">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('category.index') }}">View All categories</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('category.create') }}">Add New Category</a>
                     </li>
                 </ul>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link" href="{{ route('brands.index') }}">
                 <i class="mdi mdi-view-headline menu-icon"></i>
                 <span class="menu-title">Brands</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false"
                 aria-controls="products">
                 <i class="mdi mdi-tag menu-icon"></i>
                 <span class="menu-title">products</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="products">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('products.index') }}">View All products</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('products.create') }}">Add New product</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#colors" aria-expanded="false" aria-controls="colors">
                 <i class="mdi mdi-tag menu-icon"></i>
                 <span class="menu-title">colors</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="colors">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('colors.index') }}">View All colors</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('colors.create') }}">Add New product</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#sliders" aria-expanded="false"
                 aria-controls="sliders">
                 <i class="mdi mdi-tag menu-icon"></i>
                 <span class="menu-title">sliders</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="sliders">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('sliders.index') }}">View All sliders</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('sliders.create') }}">Add New product</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="pages/charts/chartjs.html">
                 <i class="mdi mdi-chart-pie menu-icon"></i>
                 <span class="menu-title">Charts</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="pages/tables/basic-table.html">
                 <i class="mdi mdi-grid-large menu-icon"></i>
                 <span class="menu-title">Tables</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="pages/icons/mdi.html">
                 <i class="mdi mdi-emoticon menu-icon"></i>
                 <span class="menu-title">Icons</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                 aria-controls="auth">
                 <i class="mdi mdi-account menu-icon"></i>
                 <span class="menu-title">User Pages</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="auth">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a>
                     </li>
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="documentation/documentation.html">
                 <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                 <span class="menu-title">Documentation</span>
             </a>
         </li>
     </ul>
 </nav>
