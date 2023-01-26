using CursoWindowsFormsBiblioteca;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CursoWindowsForms
{
    public partial class Frm_ValidaCPF : Form
    {
        public Frm_ValidaCPF()
        {
            InitializeComponent();
        }

        private void Btn_Reset_Click(object sender, EventArgs e)
        {
            Lbl_Resultado.Text = String.Empty;
            Msk_CPF.Text = String.Empty;
        }

        private void Btn_Valida_Click(object sender, EventArgs e)
        {
            string cpfDigitado = Msk_CPF.Text.Replace(".", "").Replace("-", "").Trim();

            if (string.IsNullOrEmpty(cpfDigitado))
            {
                MessageBox.Show("Você deve digitar um CPF", "Validação CPF", MessageBoxButtons.OK, MessageBoxIcon.Error);
                return;
            }

            if(cpfDigitado.Length != 11)
            {
                MessageBox.Show("CPF deve ter 11 dígitos", "Validação CPF", MessageBoxButtons.OK, MessageBoxIcon.Error);
                return;
            }

            if (MessageBox.Show("Deseja validar o CPF?", "Validação CPF", MessageBoxButtons.YesNo) == DialogResult.No)
                return;


            if (Cls_Uteis.ValidarCPF(Msk_CPF.Text))
            {
                MessageBox.Show("CPF Válido!", "Validação CPF", MessageBoxButtons.OK, MessageBoxIcon.Information);

                Lbl_Resultado.Text = "CPF Válido!";
                Lbl_Resultado.ForeColor = Color.Green;
            }
            else
            {
                MessageBox.Show("CPF Inválido!", "Validação CPF", MessageBoxButtons.OK, MessageBoxIcon.Error);

                Lbl_Resultado.Text = "CPF Inálido!";
                Lbl_Resultado.ForeColor = Color.Red;
            }

        }
    }
}
