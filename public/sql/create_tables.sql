-- Table Creation SQL Scripts
-- Create Categories Table
CREATE TABLE Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    Created_Date DATE NOT NULL,
    Last_Updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create Frame Material Table
CREATE TABLE Frame_Material (
    frame_material_id INT AUTO_INCREMENT PRIMARY KEY,
    Name text NOT NULL,
    Weight DECIMAL(5, 2),
    F_Color text,
    Flexibility text
);

-- Create Brand Table
CREATE TABLE Brand (
    brand_id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Origin VARCHAR(100),
    Rep_Rating DECIMAL(3, 2),
    Warranty_period INT
);

-- Create Product Table with Foreign Keys
CREATE TABLE Product (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Status VARCHAR(20),
    Price DECIMAL(10, 2),
    Launch_Date DATE,
    Stock_Quantity INT,
    category_id INT,
    frame_material_id INT,
    brand_id INT,
    FOREIGN KEY (category_id) REFERENCES Categories(category_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (frame_material_id) REFERENCES Frame_Material(frame_material_id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (brand_id) REFERENCES Brand(brand_id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- Create Lens Type Table
CREATE TABLE Lens_Type (
    lens_type_id INT AUTO_INCREMENT PRIMARY KEY,
    Thickness DECIMAL(5, 2),
    scratch_resistant BOOLEAN,
    is_anti_reflective BOOLEAN,
    is_UV BOOLEAN,
    L_Color text
);

-- Create Face Shapes Table
CREATE TABLE Face_Shapes (
    face_shape_id INT AUTO_INCREMENT PRIMARY KEY,
    Name text NOT NULL
);

-- Create Product_Lens_Relationship Table
CREATE TABLE Product_Lens (
    product_id INT,
    lens_type_id INT,
    PRIMARY KEY (product_id, lens_type_id),
    FOREIGN KEY (product_id) REFERENCES Product(product_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (lens_type_id) REFERENCES Lens_Type(lens_type_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Product_FaceShape_Relationship Table
CREATE TABLE Product_FaceShape (
    product_id INT,
    face_shape_id INT,
    PRIMARY KEY (product_id, face_shape_id),
    FOREIGN KEY (product_id) REFERENCES Product(product_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (face_shape_id) REFERENCES Face_Shapes(face_shape_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE User (
    UserId INT PRIMARY KEY NOT NULL,
    Name text NOT NULL,
    Email text NOT NULL,
    password text NOT NULL
);

-- Insert statements for Categories
INSERT INTO Categories (Created_Date, Last_Updated) VALUES
('2023-01-01', '2023-01-01'),
('2023-02-01', '2023-02-01');

-- Insert statements for Frame Material
INSERT INTO Frame_Material (Name, Weight, F_Color, Flexibility) VALUES
('Plastic', 1.5, 'Black', 'High'),
('Metal', 2.0, 'Silver', 'Medium');

-- Insert statements for Brand
INSERT INTO Brand (Name, Origin, Rep_Rating, Warranty_period) VALUES
('Ray-Ban', 'USA', 4.5, 24),
('Oakley', 'USA', 4.7, 24);

-- Insert statements for Lens Type
INSERT INTO Lens_Type (Thickness, scratch_resistant, is_anti_reflective, is_UV, L_Color) VALUES
(1.5, TRUE, TRUE, TRUE, 'Clear'),
(1.7, TRUE, FALSE, TRUE, 'Blue');

-- Insert statements for Face Shapes
INSERT INTO Face_Shapes (Name) VALUES
('Round'),
('Square');

-- Insert statements for Product
INSERT INTO Product (Name, Status, Price, Launch_Date, Stock_Quantity, category_id, frame_material_id, brand_id) VALUES
('Aviator', 'Available', 150.00, '2023-03-01', 100, 1, 1, 1),
('Wayfarer', 'Available', 120.00, '2023-04-01', 200, 2, 2, 2);

-- Insert statements for Product_Lens
INSERT INTO Product_Lens (product_id, lens_type_id) VALUES
(1, 1),
(2, 2);

-- Insert statements for Product_FaceShape
INSERT INTO Product_FaceShape (product_id, face_shape_id) VALUES
(1, 1),
(2, 2);
