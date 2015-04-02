<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                <!-- subject -->
                  @if($permissions->subject_view)
                    <li>

                        <a href="{{ URL::route('subject.index') }}">
                        <i class="fa fa-laptop"></i>
                            <span>Subjects</span>
                       </a>
                    </li>
                  @endif
                  
                  <!-- Users Crud -->
                  @if($permissions->developer_view || $permissions->user_view || $permissions->student_view)
                    <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-laptop"></i>
                          <span>Create Users</span>
                      </a>
                      <ul class="sub">
                          @if($permissions->developer_view)
                            <li><a  href="{{ URL::route('developer.index') }}">Developer</a></li>
                          @endif

                          @if($permissions->user_view)
                            <li><a  href="{{ URL::route('user.index') }}">User</a></li>
                          @endif

                          @if($permissions->student_view)
                            <li><a href="{{ URL::route('student.index') }}">Student</a></li>
                          @endif

                          
                          
                      </ul>
                    </li>

                  @endif


                  <!-- Class CRUD -->
                  @if($permissions->class_view)
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Classes</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="{{ URL::route('class.index') }}">Create Classes</a></li>
                        </ul>
                    </li>
                  @endif


                  <!-- Chapter CRUD -->
                  @if($permissions->chapter_view)
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-cogs"></i>
                            <span>Chapters</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="{{ URL::route('chapter.index') }}">Create Chapter</a></li>
                        </ul>
                    </li>
                  @endif

                  @if($permissions->section_view)
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-tasks"></i>
                            <span>Section</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="{{ URL::route('section.index') }}">Create Section</a></li>
                        </ul>
                    </li>
                  @endif


                  <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Question Properties</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="{{ URL::route('knowledge.index') }}">Create Knowledge</a></li>
                        </ul>

                        <ul class="sub">
                            <li><a  href="{{ URL::route('skill.index') }}">Create Skill</a></li>
                        </ul>

                        <ul class="sub">
                            <li><a  href="{{ URL::route('highskill.index') }}">Create Higher Order Skill</a></li>
                        </ul>
                    </li>



              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>