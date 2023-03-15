<?php
function add_large_numbers($num1, $num2) {
  // Chuyển hai số thành danh sách các chữ số và đảo ngược danh sách
  $num1_list = str_split(strrev($num1));
  $num2_list = str_split(strrev($num2));
  $result = array();
  $carry = 0;
  // Làm cho hai số có cùng độ dài bằng cách thêm số 0 vào đầu danh sách
  while (count($num1_list) < count($num2_list)) {
      $num1_list[] = '0';
  }
  while (count($num2_list) < count($num1_list)) {
      $num2_list[] = '0';
  }
  // Thực hiện phép cộng các chữ số từ phải sang trái
  for ($i = 0; $i < count($num1_list); $i++) {
      $digit_sum = intval($num1_list[$i]) + intval($num2_list[$i]) + $carry;
      if ($digit_sum > 9) {
          $carry = 1;
          $digit_sum -= 10;
      } else {
          $carry = 0;
      }
      $result[] = strval($digit_sum);
  }
  // Nếu còn số nhớ, thêm vào kết quả
  if ($carry) {
      $result[] = '1';
  }
  // Đảo ngược kết quả và trả về chuỗi
  return strrev(join($result));
}
$num1 = "123456789";
$num2 = "987654321";
$result = add_large_numbers($num1, $num2);
echo $result; // In ra kết quả của phép cộng
?>