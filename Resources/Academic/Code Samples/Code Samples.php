<?php
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php');
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<div class="container mt-5 mb-5">
  <h1 class="fw-bold text-center">Code Samples</h1>
  <p class="lead text-center mb-4">Browse through our collection of ready-to-use code snippets and examples across multiple languages.</p>

  <!-- Download All Button -->
  <div class="text-center mb-5">
    <a href="upload.zip" class="btn btn-lg btn-success" download>
      <i class="bi bi-download me-2"></i> Download All Code Samples (ZIP)
    </a>
  </div>

  <!-- Language Tabs -->
  <ul class="nav nav-pills justify-content-center mb-4" id="pills-tab" role="tablist">
    <li class="nav-item">
      <button class="nav-link active" id="python-tab" data-bs-toggle="pill" data-bs-target="#python" type="button">Python</button>
    </li>
    <li class="nav-item">
      <button class="nav-link" id="js-tab" data-bs-toggle="pill" data-bs-target="#javascript" type="button">JavaScript</button>
    </li>
    <li class="nav-item">
      <button class="nav-link" id="php-tab" data-bs-toggle="pill" data-bs-target="#php" type="button">PHP</button>
    </li>
    <li class="nav-item">
      <button class="nav-link" id="cpp-tab" data-bs-toggle="pill" data-bs-target="#cpp" type="button">C++</button>
    </li>
  </ul>

  <div class="tab-content" id="pills-tabContent">
    <!-- Python -->
    <div class="tab-pane fade show active" id="python" role="tabpanel">
      <h4 class="mb-3">Python Examples</h4>
      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Hello World</h5>
          <pre class="bg-dark text-light p-3 rounded position-relative"><code id="python1"># Example: Hello World
print("Hello, TecWorld Academy!")</code></pre>
          <button class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-2 copy-btn" data-target="python1">Copy</button>
        </div>
      </div>

      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Loop Example</h5>
          <pre class="bg-dark text-light p-3 rounded position-relative"><code id="python2"># Example: Loop
for i in range(5):
    print("Number:", i)</code></pre>
          <button class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-2 copy-btn" data-target="python2">Copy</button>
        </div>
      </div>
    </div>

    <!-- JavaScript -->
    <div class="tab-pane fade" id="javascript" role="tabpanel">
      <h4 class="mb-3">JavaScript Examples</h4>
      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Hello World</h5>
          <pre class="bg-dark text-light p-3 rounded position-relative"><code id="js1">// Example: Hello World
console.log("Hello, TecWorld Academy!");</code></pre>
          <button class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-2 copy-btn" data-target="js1">Copy</button>
        </div>
      </div>

      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Function Example</h5>
          <pre class="bg-dark text-light p-3 rounded position-relative"><code id="js2">// Example: Function
function greet(name) {
  return "Hello, " + name + "!";
}
console.log(greet("Student"));</code></pre>
          <button class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-2 copy-btn" data-target="js2">Copy</button>
        </div>
      </div>
    </div>

    <!-- PHP -->
    <div class="tab-pane fade" id="php" role="tabpanel">
      <h4 class="mb-3">PHP Examples</h4>
      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Hello World</h5>
          <pre class="bg-dark text-light p-3 rounded position-relative"><code id="php1">&lt;?php
// Example: Hello World
echo "Hello, TecWorld Academy!";
?&gt;</code></pre>
          <button class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-2 copy-btn" data-target="php1">Copy</button>
        </div>
      </div>

      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Array Loop</h5>
          <pre class="bg-dark text-light p-3 rounded position-relative"><code id="php2">&lt;?php
// Example: Array Loop
$students = ["Alice", "Bob", "Charlie"];
foreach ($students as $student) {
    echo $student . "&lt;br&gt;";
}
?&gt;</code></pre>
          <button class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-2 copy-btn" data-target="php2">Copy</button>
        </div>
      </div>
    </div>

    <!-- C++ -->
    <div class="tab-pane fade" id="cpp" role="tabpanel">
      <h4 class="mb-3">C++ Examples</h4>
      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Hello World</h5>
          <pre class="bg-dark text-light p-3 rounded position-relative"><code id="cpp1">// Example: Hello World
#include &lt;iostream&gt;
using namespace std;

int main() {
    cout &lt;&lt; "Hello, TecWorld Academy!" &lt;&lt; endl;
    return 0;
}</code></pre>
          <button class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-2 copy-btn" data-target="cpp1">Copy</button>
        </div>
      </div>

      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Loop Example</h5>
          <pre class="bg-dark text-light p-3 rounded position-relative"><code id="cpp2">// Example: Simple Loop
#include &lt;iostream&gt;
using namespace std;

int main() {
    for(int i = 0; i &lt; 5; i++) {
        cout &lt;&lt; "Number: " &lt;&lt; i &lt;&lt; endl;
    }
    return 0;
}</code></pre>
          <button class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-2 copy-btn" data-target="cpp2">Copy</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Copy Script -->
<script>
  document.querySelectorAll('.copy-btn').forEach(button => {
    button.addEventListener('click', () => {
      const targetId = button.getAttribute('data-target');
      const code = document.getElementById(targetId).innerText;
      navigator.clipboard.writeText(code).then(() => {
        button.textContent = "Copied!";
        setTimeout(() => button.textContent = "Copy", 2000);
      });
    });
  });
</script>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php');
include(__DIR__ . '/../../../includes/footer/footer.php');
?>
