-- Table Creation SQL Scripts
-- Create Categories Table
CREATE TABLE Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
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
    Name VARCHAR(100) NOT NULL,
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
    UserId INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Insert statements for Categories
INSERT INTO Categories (Name, Created_Date, Last_Updated) VALUES
('Sunglasses', '2023-01-01', '2023-01-01'),
('Eyeglasses', '2023-02-01', '2023-02-01');

-- Insert statements for Frame Material
INSERT INTO Frame_Material (Name, Weight, F_Color, Flexibility) VALUES
('Plastic', 1.5, 'Black', 'High'),
('Metal', 2.0, 'Silver', 'Medium');

-- Insert statements for Brand
INSERT INTO Brand (Name, Origin, Rep_Rating, Warranty_period) VALUES
('Ray-Ban', 'USA', 4.5, 24),
('Oakley', 'USA', 4.7, 24);

-- Insert statements for Lens Type
INSERT INTO Lens_Type (Name, Thickness, scratch_resistant, is_anti_reflective, is_UV, L_Color) VALUES
('Standard', 1.5, TRUE, TRUE, TRUE, 'Clear'),
('Blue Light', 1.7, TRUE, FALSE, TRUE, 'Blue');

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
-- Additional Insert statements for Categories
INSERT INTO Categories (Name, Created_Date, Last_Updated) VALUES
('Sports', '2023-05-01', '2023-05-01'),
('Fashion', '2023-06-01', '2023-06-01'),
('Reading', '2023-07-01', '2023-07-01'),
('Safety', '2023-08-01', '2023-08-01'),
('Kids', '2023-09-01', '2023-09-01');

-- Additional Insert statements for Frame Material
INSERT INTO Frame_Material (Name, Weight, F_Color, Flexibility) VALUES
('Titanium', 1.2, 'Gray', 'High'),
('Wood', 1.8, 'Brown', 'Low'),
('Carbon Fiber', 1.3, 'Black', 'High'),
('Acetate', 1.6, 'Tortoise', 'Medium'),
('Aluminum', 2.1, 'Silver', 'Medium');

-- Additional Insert statements for Brand
INSERT INTO Brand (Name, Origin, Rep_Rating, Warranty_period) VALUES
('Gucci', 'Italy', 4.8, 24),
('Prada', 'Italy', 4.6, 24),
('Versace', 'Italy', 4.7, 24),
('Armani', 'Italy', 4.5, 24),
('Dolce & Gabbana', 'Italy', 4.4, 24);

-- Additional Insert statements for Lens Type
INSERT INTO Lens_Type (Name, Thickness, scratch_resistant, is_anti_reflective, is_UV, L_Color) VALUES
('Polarized', 1.6, TRUE, TRUE, TRUE, 'Gray'),
('Photochromic', 1.5, TRUE, TRUE, TRUE, 'Clear'),
('High Index', 1.8, TRUE, TRUE, TRUE, 'Clear'),
('Trivex', 1.4, TRUE, TRUE, TRUE, 'Clear'),
('Polycarbonate', 1.3, TRUE, TRUE, TRUE, 'Clear');

-- Additional Insert statements for Face Shapes
INSERT INTO Face_Shapes (Name) VALUES
('Oval'),
('Heart'),
('Diamond'),
('Rectangle'),
('Triangle');

-- Additional Insert statements for Product
INSERT INTO Product (Name, Status, Price, Launch_Date, Stock_Quantity, category_id, frame_material_id, brand_id) VALUES
('Sporty', 'Available', 180.00, '2023-05-01', 150, 3, 3, 3),
('Fashionista', 'Available', 200.00, '2023-06-01', 120, 4, 4, 4),
('Reader', 'Available', 100.00, '2023-07-01', 80, 5, 5, 5),
('Safety First', 'Available', 90.00, '2023-08-01', 60, 6, 6, 6),
('Kids Fun', 'Available', 70.00, '2023-09-01', 50, 7, 7, 7),
('Classic', 'Available', 130.00, '2023-10-01', 110, 1, 1, 1),
('Modern', 'Available', 140.00, '2023-11-01', 90, 2, 2, 2),
('Elegant', 'Available', 160.00, '2023-12-01', 70, 3, 3, 3),
('Trendy', 'Available', 170.00, '2024-01-01', 100, 4, 4, 4),
('Vintage', 'Available', 150.00, '2024-02-01', 80, 5, 5, 5);


-- Trigger name: update_last_updated
-- Table: Categories
-- Time: BEFORE
-- Event: UPDATE
-- Definition: Sets the Last_Updated column to the current timestamp before updating a row in the Categories table.
-- Definer: The user who creates the trigger
-- Trigger to update Last_Updated column in Categories table
DELIMITER //
CREATE TRIGGER update_last_updated
BEFORE UPDATE ON Categories
FOR EACH ROW
BEGIN
    SET NEW.Last_Updated = CURRENT_TIMESTAMP;
END;
