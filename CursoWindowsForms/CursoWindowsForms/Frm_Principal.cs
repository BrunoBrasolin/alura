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
    public partial class Frm_Principal : Form
    {
        public Frm_Principal()
        {
            InitializeComponent();
        }

        private void Frm_DemonstracaoKey_Click(object sender, EventArgs e)
        {
            Frm_DemonstracaoKey form = new Frm_DemonstracaoKey();
            form.ShowDialog();
        }

        private void Btn_HelloWorld_Click(object sender, EventArgs e)
        {
            Frm_HelloWorld form = new Frm_HelloWorld();
            form.ShowDialog();
        }

        private void Btn_Mascara_Click(object sender, EventArgs e)
        {
            Frm_Mascara form = new Frm_Mascara();
            form.ShowDialog();
        }

        private void Btn_ValidaCPF_Click(object sender, EventArgs e)
        {
            Frm_ValidaCPF form = new Frm_ValidaCPF();
            form.ShowDialog();
        }

        private void Btn_ValidaSenha_Click(object sender, EventArgs e)
        {
            Frm_ValidaSenha form = new Frm_ValidaSenha();
            form.ShowDialog();
        }

        private void Btn_Sair_Click(object sender, EventArgs e)
        {
            if (MessageBox.Show("Realmente deseja sair?", "Sair aplicação", MessageBoxButtons.YesNo, MessageBoxIcon.Question) == DialogResult.Yes)
                Application.Exit();
        }
    }
}
