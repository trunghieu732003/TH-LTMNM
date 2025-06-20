<?php 
require_once('app/config/database.php'); 
require_once('app/models/ProductModel.php'); 
require_once('app/models/CategoryModel.php'); 
require_once('app/utils/JWTHandler.php');

class ProductApiController 
{ 
    private $productModel; 
    private $db; 
    private $jwtHandler;
    
    public function __construct() 
    { 
        $this->db = (new Database())->getConnection(); 
        $this->productModel = new ProductModel($this->db); 
        $this->jwtHandler = new JWTHandler();
    } 
    
    private function authenticate() 
    { 
        $headers = apache_request_headers(); 
        if (isset($headers['Authorization'])) { 
            $authHeader = $headers['Authorization']; 
            $arr = explode(" ", $authHeader); 
            $jwt = $arr[1] ?? null; 
            if ($jwt) { 
                return $this->jwtHandler->decode($jwt); 
            } 
        } 
        return false; 
    }
    
    // Lấy danh sách sản phẩm 
    public function index() 
    { 
        $auth = $this->authenticate();
        if (!$auth) {
            http_response_code(401); 
            echo json_encode(['message' => 'Unauthorized']);
            return;
        }
        
        header('Content-Type: application/json'); 
        $products = $this->productModel->getProducts(); 
        echo json_encode($products); 
    } 
    
    // Lấy thông tin sản phẩm theo ID 
    public function show($id) 
    { 
        $auth = $this->authenticate();
        if (!$auth) {
            http_response_code(401); 
            echo json_encode(['message' => 'Unauthorized']);
            return;
        }
        
        header('Content-Type: application/json'); 
        $product = $this->productModel->getProductById($id); 
        if ($product) { 
            echo json_encode($product); 
        } else { 
            http_response_code(404); 
            echo json_encode(['message' => 'Product not found']); 
        } 
    } 
    
    // Thêm sản phẩm mới 
    public function store() 
    { 
        $auth = $this->authenticate();
        if (!$auth || $auth['role'] != 'admin') {
            http_response_code(403); 
            echo json_encode(['message' => 'Forbidden: Admin access required']);
            return;
        }
        
        header('Content-Type: application/json');
        
        // Xử lý dữ liệu form-data
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $price = $_POST['price'] ?? '';
        $category_id = $_POST['category_id'] ?? null;
        $image = $_FILES['image'] ?? null;
        
        $result = $this->productModel->addProduct($name, $description, $price, $category_id, $image);
        
        if (is_array($result)) { 
            http_response_code(400); 
            echo json_encode(['errors' => $result]); 
        } else { 
            http_response_code(201); 
            echo json_encode(['message' => 'Product created successfully']); 
        } 
    } 
    
    // Cập nhật sản phẩm theo ID 
    public function update($id) 
    { 
        $auth = $this->authenticate();
        if (!$auth || $auth['role'] != 'admin') {
            http_response_code(403); 
            echo json_encode(['message' => 'Forbidden: Admin access required']);
            return;
        }
        
        header('Content-Type: application/json');
        
        // Xử lý dữ liệu form-data
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $price = $_POST['price'] ?? '';
        $category_id = $_POST['category_id'] ?? null;
        $image = $_FILES['image'] ?? null;
        
        $result = $this->productModel->updateProduct($id, $name, $description, $price, $category_id, $image);
        
        if ($result) { 
            echo json_encode(['message' => 'Product updated successfully']); 
        } else { 
            http_response_code(400); 
            echo json_encode(['message' => 'Product update failed']); 
        } 
    } 
    
    // Xóa sản phẩm theo ID 
    public function destroy($id) 
    { 
        $auth = $this->authenticate();
        if (!$auth || $auth['role'] != 'admin') {
            http_response_code(403); 
            echo json_encode(['message' => 'Forbidden: Admin access required']);
            return;
        }
        
        header('Content-Type: application/json'); 
        $result = $this->productModel->deleteProduct($id); 
        if ($result) { 
            echo json_encode(['message' => 'Product deleted successfully']); 
        } else { 
            http_response_code(400); 
            echo json_encode(['message' => 'Product deletion failed']);
        } 
    } 
}