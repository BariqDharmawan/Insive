<div class="sidebar mySimpleBar"  data-simplebar data-simplebar-auto-hide="true">
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (Request::is('admin/dashboard'))? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.sheet.index') }}" class="nav-link {{ (Request::is('admin/sheet'))? 'active' : '' }}">
            <i class="nav-icon fa fa-credit-card"></i>
            <p>
              Sheet
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.fragrance.index') }}" class="nav-link {{ (Request::is('admin/fragrance'))? 'active' : '' }}">
            <i class="nav-icon fa fa-credit-card"></i>
            <p>
              Fragrance
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.pricing.index') }}" class="nav-link {{ (Request::is('admin/pricing'))? 'active' : '' }}">
            <i class="nav-icon fa fa-credit-card"></i>
            <p>
              Pricing
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.question.index') }}" class="nav-link {{ (Request::is('admin/question'))? 'active' : '' }}">
            <i class="nav-icon fa fa-question"></i>
            <p>
              Question
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.logic.index') }}" class="nav-link {{ (Request::is('admin/logic'))? 'active' : '' }}">
            <i class="nav-icon fas fa-atom"></i>
            <p>
              Logic
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{ (Request::is('admin/product*')) ? 'active' : ''  }}">
            <i class="nav-icon fas fa-table"></i>
            <p>Product <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.product.index') }}" class="nav-link {{ (Request::is('admin/product')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-list-ol"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.product.trashed') }}" class="nav-link {{ (Request::is('admin/product/trash')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-trash"></i>
                <p>Removed</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.faq.index') }}" class="nav-link">
            <i class="nav-icon fas fa-tasks"></i>
            <p>Faq</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{ (Request::is('admin/how-to-order*')) ? 'active' : ''  }}">
            <i class="nav-icon fas fa-atlas"></i>
            <p>
              How To Order
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.how-to-order.index') }}" class="nav-link {{ (Request::is('admin/how-to-order')) ? 'active' : ''  }}">
                <i class="nav-icon fas fa-book-open"></i>
                <p>Index</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.how-to-order.create') }}" class="nav-link {{ (Request::is('admin/how-to-order/create')) ? 'active' : ''  }}">
                <i class="nav-icon fas fa-plus-square"></i>
                <p>Create Page</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
